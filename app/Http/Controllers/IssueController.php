<?php

namespace App\Http\Controllers;

use App\Services\IssueService;

class IssueController extends Controller
{
    protected $issueService;

    public function __construct(IssueService $issueService)
    {
        $this->issueService = $issueService;
    }

    public function index()
    {
        if (empty($this->issueService->index()->all())) {
            $this->issueService->processUpdateSchedule();
        }

        return view('index');
    }
}
