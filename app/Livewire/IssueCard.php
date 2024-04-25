<?php

namespace App\Livewire;

use App\Models\Issue;
use App\Models\Website;
use Livewire\Component;

class IssueCard extends Component
{
    public Issue $issue;
    public Website $website;

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

    public function deleteIssue()
    {
        $this->issue->delete();

        session()->flash("success", "deleted!");

        $this->redirectRoute("issues.index", ["website" => $this->website]);

        //return redirect()->route("website.show", ["website" => $this->website])->with("success", "deleted!");
    }
}
