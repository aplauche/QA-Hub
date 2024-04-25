<?php

namespace App\Livewire\Forms;

use App\Models\Website;
use Livewire\Attributes\Validate;
use Livewire\Form;


class IssueForm extends Form
{

    public Website $website;

    #[Validate('required|string')]
    public $page = "";

    #[Validate('required|string')]
    public $browser = "";

    #[Validate('required|string')]
    public $screen_size = "";

    #[Validate('required|string')]
    public $description = "";


    public function setWebsite(Website $website)
    {
        $this->website = $website;
    }

    public function store()
    {

        $this->validate();

        auth()->user()->issues()->create([
            "page" => $this->page,
            "browser" => $this->browser,
            "screen_size" => $this->screen_size,
            "description" => $this->description,
            "website_id" => $this->website->id
        ]);
    }
}
