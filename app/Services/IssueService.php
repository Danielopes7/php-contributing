<?php

namespace App\Services;

use App\Models\Issue;
use Github\Client;
use Github\ResultPager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IssueService
{
    private $method = 'issues';

    protected $repositoryService;

    protected $labelService;

    protected $client;

    public function __construct(RepositoryService $repositoryService, LabelService $labelService, Client $client)
    {
        $this->repositoryService = $repositoryService;
        $this->labelService = $labelService;
        $this->client = $client;
    }

    public function index(array $filters_label = [], ?string $filter_size = null)
    {
        $query = Issue::select('issues.*')
            ->join('issue_label', 'issues.id', '=', 'issue_label.issue_id')
            ->join('labels', 'labels.id', '=', 'issue_label.label_id')
            ->join('repositories', 'repositories.id', '=', 'issues.repository_id');
        if (! empty($filters_label)) {
            $query->whereIn('labels.name', $filters_label)
                ->havingRaw('COUNT(DISTINCT labels.name) = ?', [count($filters_label)]);
        }

        $array_size = $this->repositoryService->metricsSizeProject($filter_size);
        if (! empty($array_size)) {
            $query->whereBetween('stargazers_count', [$array_size['stargazers_count_ini'], $array_size['stargazers_count_end']])
                ->whereBetween('forks', [$array_size['forks_count_ini'], $array_size['forks_count_end']]);
        }
        $filteredIssues = $query->groupBy('issues.id')
            ->get();

        return $filteredIssues;
    }

    public function processUpdateSchedule()
    {
        $threeMonthsAgo = date('Y-m-d', strtotime('-3 months'));
        $parameters = ['created:>'.$threeMonthsAgo.' label:"good first issue" language:PHP is:open'];
        $issueList = $this->getIssueFromGit($parameters);
        $this->execSchedule($issueList);
    }

    public function getIssueFromGit(array $parameters): array
    {
        try {
            $pager = new ResultPager($this->client, 30);

            return $pager->fetch($this->client->search(), $this->method, $parameters);
        } catch (\Exception $e) {

            Log::error('Error fetching issue from GitHub: '.$e->getMessage());

            return [];
        }
    }

    public function createIssueWithDetails(array $issueData, array $repositoryData, array $labelsData): void
    {
        try {
            $repository = $this->repositoryService->createIfNotExists($repositoryData);

            $issue = Issue::create(array_merge($issueData, ['repository_id' => $repository->id]));

            foreach ($labelsData as $labelData) {
                $label = $this->labelService->createIfNotExists($labelData);
                $issue->labels()->attach($label);
            }
        } catch (\Exception $e) {
            Log::error('Error creating issue with details: '.$e->getMessage());
        }
    }

    public function execSchedule(array $issue): void
    {
        try {
            DB::transaction(function () use ($issue) {
                $this->deleteAll();
                $this->repositoryService->deleteAll();
                $this->labelService->deleteAll();
                DB::table('issue_label')->delete();

                foreach ($issue['items'] as $issue) {
                    $issueData = $this->mountIssueData($issue);
                    $labelsData = $this->labelService->mountLabelsData($issue['labels']);
                    $repositoryData = $this->repositoryService->mountRepositoryDataFromUrl($issue['repository_url']);
                    $this->createIssueWithDetails($issueData, $repositoryData, $labelsData);
                }
            });
        } catch (\Exception $e) {
            Log::error('Error exec schedule: '.$e->getMessage());
        }
    }

    protected function mountIssueData(array $issue): array
    {
        if (empty($issue)) {
            return [];
        }

        return [
            'url' => $issue['url'] ?? null,
            'html_url' => $issue['html_url'] ?? null,
            'issue_id' => $issue['id'] ?? null,
            'number' => $issue['number'] ?? null,
            'title' => $issue['title'] ?? null,
            'user_login' => $issue['user']['login'] ?? null,
            'user_avatar_url' => $issue['user']['avatar_url'] ?? null,
            'state' => $issue['state'] ?? null,
            'comments' => $issue['comments'] ?? 0,
            'created_at' => $issue['created_at'] ?? null,
            'updated_at' => $issue['updated_at'] ?? null,
            'closed_at' => $issue['closed_at'] ?? null,
            'body' => $issue['body'] ?? null,
        ];
    }

    public function deleteAll(): void
    {
        Issue::query()->delete();
    }
}
