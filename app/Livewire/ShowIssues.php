<?php

namespace App\Livewire;

use App\Services\IssueService;
use Livewire\Component;

class ShowIssues extends Component
{
    public $issues;

    public array $filters_label;

    public $filter_size;

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
        $this->filters_label = in_array($event, $this->filters_label)
        ? array_diff($this->filters_label, [$event])
        : array_merge($this->filters_label, [$event]);

        $this->issues = $issueService->index($this->filters_label, $this->filter_size);
    }

    public function reloadIssuesBySize($event, IssueService $issueService)
    {
        $this->filter_size = $this->filter_size == $event ? '' : $event;
        $this->issues = $issueService->index($this->filters_label, $this->filter_size);
    }
}
