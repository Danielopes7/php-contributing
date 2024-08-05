<?php

namespace App\Services;

use Github\ResultPager;
use Github\Client;
use Illuminate\Support\Facades\DB;
use App\Models\Issue;
use Illuminate\Support\Facades\Log;

class IssueService
{
    private $method = "issues";
    protected $repositoryService;
    protected $labelService;
    protected $client;
    public function __construct(RepositoryService $repositoryService, LabelService $labelService, Client $client)
    {
        $this->repositoryService = $repositoryService;
        $this->labelService = $labelService;
        $this->client = $client;
    }

    public function index(array $filters_label = [], string $type_project = null)
    {   
        $query = Issue::select('issues.*')
        ->join('issue_label', 'issues.id', '=', 'issue_label.issue_id')
        ->join('labels', 'labels.id', '=', 'issue_label.label_id')
        ->join('repositories', 'repositories.id', '=', 'issues.repository_id');
        if (!empty($filters_label)) {
            $query->whereIn('labels.name', $filters_label)
                ->havingRaw('COUNT(DISTINCT labels.name) = ?', [count($filters_label)]);
        }
        if (!empty($star_num)) {
            $query->where('stargazers_count', '>=' , $star_num);
        }
        $filteredIssues = $query->groupBy('issues.id')
            ->get();
        return ($filteredIssues);
    }
    public function processUpdateSchedule()
    {
        $parameters = ['created:>2024-01-01 label:"good first issue" label:bug language:PHP is:open comments:<2'];
        $issueList = $this->getIssueFromGit($parameters);
        $this->execSchedule($issueList);
    }
    public function getIssueFromGit(array $parameters): array
    {
        try {
            // Mount the request
            $pager = new ResultPager($this->client, 4);
            return $pager->fetch($this->client->search(), $this->method, $parameters);
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            Log::error('Error fetching issue from GitHub: ' . $e->getMessage());

            // Optionally, you can return a default value or throw a custom exception
            throw new \RuntimeException('Failed to fetch issue from GitHub', 0, $e);
            return [];
        }
    }

    public function createIssueWithDetails(array $issueData, array $repositoryData, array $labelsData): void
    {
        try {
            // Use the RepositoryService to create or find the repository
            $repository = $this->repositoryService->createIfNotExists($repositoryData);

            // Create the issue
            $issue = Issue::create(array_merge($issueData, ['repository_id' => $repository->id]));

            // Attach labels to the issue using LabelService
            foreach ($labelsData as $labelData) {
                $label = $this->labelService->createIfNotExists($labelData);
                $issue->labels()->attach($label);
            }
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            Log::error('Error creating issue with details: ' . $e->getMessage());
        }
    }

    public function execSchedule(array $issue)
    {
        try {
            return DB::transaction(function () use ($issue) {
                // Remove all data from the issue, repository, labels, and issue_label tables
                $this->deleteAll();
                $this->repositoryService->deleteAll();
                $this->labelService->deleteAll();
                DB::table('issue_label')->delete(); // Remove all data from the pivot table

                foreach ($issue['items'] as $issue) {
                    $issueData = $this->mountIssueData($issue);
                    $labelsData = $this->labelService->mountLabelsData($issue['labels']);
                    $repositoryData = $this->repositoryService->mountRepositoryDataFromUrl($issue['repository_url']);
                    $this->createIssueWithDetails($issueData, $repositoryData, $labelsData);
                }
            });
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            Log::error('Error exec schedule: ' . $e->getMessage());
        }
    }

    protected function mountIssueData(array $issue): array
    {
        try {
            if (!empty($issue)) {
                return [
                    "url" => $issue['url'],
                    "html_url" => $issue['html_url'],
                    "issue_id" => $issue['id'],
                    "number" => $issue['number'],
                    "title" => $issue['title'],
                    "user_login" => $issue['user']['login'],
                    "user_avatar_url" => $issue['user']['avatar_url'],
                    "state" => $issue['state'],
                    "comments" => $issue['comments'],
                    "created_at" => $issue['created_at'],
                    "updated_at" => $issue['updated_at'],
                    "closed_at" => $issue['closed_at'],
                    "body" => $issue['body'],
                ];
            }
        } catch (\Exception $e) {
            Log::error('Error to mount issue array: ' . $e->getMessage());
            return [];
        }
    }

    public function deleteAll(): void
    {
        try {
            Issue::query()->delete();
            Log::info('All issue have been successfully deleted.');
        } catch (\Exception $e) {
            Log::error('Error deleting all issue: ' . $e->getMessage());
        }
    }
}
