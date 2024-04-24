<?php

namespace App\Livewire;

use App\Models\Issue;
use Livewire\Component;

class IssueCard extends Component
{
    public Issue $issue;

    public function render()
    {
        return view('livewire.issue-card');
    }

    public function markComplete()
    {
        $this->issue->update([
            "completed" => true
        ]);
    }

    public function markIncomplete()
    {
        $this->issue->update([
            "completed" => false
        ]);
    }
}
