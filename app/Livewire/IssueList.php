<?php

namespace App\Livewire;

use App\Models\Issue;
use App\Models\Website;
use Livewire\Attributes\On;
use Livewire\Component;

class IssueList extends Component
{

    public Website $website;
    public $issues;
    public $completedIssues;
    public $activeIssues;
    public $priorityFilters;
    public $priorityFilterDictionary;

    public function mount()
    {
        $this->priorityFilterDictionary = Issue::$priorityDictionary;
        $this->priorityFilters = [];
        $this->fetchData();
    }

    public function handleFilterToggle(int $priority)
    {
        if (in_array($priority, $this->priorityFilters)) {
            $this->priorityFilters = array_filter($this->priorityFilters, function ($item) use ($priority) {
                return $item !== $priority;
            });
        } else {
            array_push($this->priorityFilters, $priority);
        }
    }

    public function fetchData()
    {
        if (count($this->priorityFilters) === 0) {
            $this->activeIssues = $this->website->issues()
                ->where("completed", false)
                ->orderBy('priority', 'desc')
                ->get();
            $this->completedIssues = $this->website->issues()
                ->where("completed", true)
                ->orderBy('priority', 'desc')
                ->get();
        } else {
            $this->activeIssues = $this->website->issues()
                ->where("completed", false)
                ->whereIn("priority", $this->priorityFilters)
                ->orderBy('priority', 'desc')
                ->get();
            $this->completedIssues = $this->website->issues()
                ->where("completed", true)
                ->whereIn("priority", $this->priorityFilters)
                ->orderBy('priority', 'desc')
                ->get();
        }

        //$this->issues = $this->website->issues()->get();
    }

    #[On('issueListChange')]
    public function render()
    {
        $this->fetchData();
        return view('livewire.issue-list');
    }
}
