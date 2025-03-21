<?php

namespace App\Tasks;

use App\Services\IssueService;

class UpdateRecentIssues
{
    protected $issueService;

    public function __construct(IssueService $issueService)
    {
        $this->issueService = $issueService;
    }

    public function __invoke()
    {
        $this->issueService->processUpdateSchedule();
    }
}
