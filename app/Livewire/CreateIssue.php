<?php

namespace App\Livewire;

use App\Livewire\Forms\IssueForm;
use Livewire\Attributes\Validate;
use App\Models\Issue;
use App\Models\Website;
use Livewire\Component;

class CreateIssue extends Component
{

    public Website $website;
    public IssueForm $form;
    public bool $isQA = false;

    public function mount(Website $website)
    {
        $this->form->setWebsite($website);
    }


    public function save()
    {

        $this->form->store();

        session()->flash('success', 'Issue Added!');

        if ($this->isQA) {
            return $this->redirectRoute("websites.show", ["website" => $this->website]);
        }

        return $this->redirectRoute("issues.index", ["website" => $this->website]);
    }

    public function render()
    {
        return view('livewire.create-issue');
    }
}
