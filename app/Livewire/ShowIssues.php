<?php

namespace App\Livewire;

use App\Services\IssueService;
use Livewire\Component;

class ShowIssues extends Component
{
    public $issues;

    public function mount(IssueService $issueService)
    {
        $this->issues = $issueService->index();
    }

    public function render()
    {
        return view('livewire.show-issues');
    }

    public function reloadIssues($event, IssueService $issueService)
    {
        $this->issues = $issueService->index($event);
    }
}

