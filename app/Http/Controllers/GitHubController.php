<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Github\ResultPager;
use Github\Client;
use App\Services\IssueService;

class GitHubController extends Controller
{
    protected $issueService;
    public function __construct(IssueService $issueService)
    {
        $this->issueService = $issueService;
    }

    public function searchIssues(Client $client)
    {
        return view('index');
        dd('teste');
        $this->issueService->processUpdateSchedule();
        $pager = new ResultPager($client, 3);
        $api = $client->search();
        $method = 'issues';
        $repo = $client->api('repo')->show('Submitty', 'Submitty');
        dd($repo);
        $parameters = ['created:>2024-01-01 label:"good first issue" label:bug language:PHP is:open comments:<2'];

        $issues = $pager->fetch($api, $method, $parameters);
        dd($issues);
        $teste = 0;
        do {
            // Processar as issues da página atual
            foreach ($issues['items'] as $issue) {
                // Faça algo com cada issue
                echo $issue['title'] . "\n";
            }

            // Buscar a próxima página de resultados
            $issues = $pager->fetchNext();
            $teste == $teste + 1;
        } while ($teste < 2);
        return view('index');

        return response()->json($issues);
    }
}
