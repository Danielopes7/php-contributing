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
        if (empty($this->issueService->index()->all())){
            $this->issueService->processUpdateSchedule();
        }
        return view('index');
    }
}
