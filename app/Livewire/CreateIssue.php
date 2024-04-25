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

    public function mount(Website $website)
    {
        $this->form->setWebsite($website);
    }


    public function save()
    {

        $this->form->store();

        session()->flash('success', 'Issue Added!');

        return $this->redirectRoute("issues.index", ["website" => $this->website]);
    }

    public function render()
    {
        return view('livewire.create-issue');
    }
}
