<?php

namespace App\Livewire;

use App\Models\Website;
use Livewire\Attributes\On;
use Livewire\Component;

class IssueList extends Component
{

    public Website $website;
    public $issues;
    public $completedIssues;
    public $activeIssues;

    public function mount()
    {
        $this->activeIssues = $this->website->issues()->where("completed", false)->get();
        $this->completedIssues = $this->website->issues()->where("completed", true)->get();
        $this->issues = $this->website->issues()->get();
    }

    #[On('issueListChange')]
    public function render()
    {
        $this->activeIssues = $this->website->issues()->where("completed", false)->get();
        $this->completedIssues = $this->website->issues()->where("completed", true)->get();
        $this->issues = $this->website->issues()->get();
        return view('livewire.issue-list');
    }
}
