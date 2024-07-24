<?php

namespace App\Http\Controllers;

use App\Services\GitHubApi;

class GitHubController extends Controller
{
    protected $githubApi;

    public function __construct(GitHubApi $githubApi)
    {
        $this->githubApi = $githubApi;
    }

    public function searchIssues()
    {
        $client = $this->githubApi->getClient();
        $issues = $client->search()->issues('created:>2024-01-01 label:"good first issue" label:bug language:PHP');

        return response()->json($issues);
    }
}
