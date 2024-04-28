<?php

namespace App\Livewire\Forms;

use App\Models\Website;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class IssueForm extends Form
{
    use WithFileUploads;

    public Website $website;

    #[Validate('required|string')]
    public $page = "";

    #[Validate('required|string')]
    public $browser = "";

    #[Validate('required|string')]
    public $screen_size = "";

    #[Validate('required|string')]
    public $description = "";

    #[Validate('image|max:4096')] // 4MB Max
    public $screenshot;


    public function setWebsite(Website $website)
    {
        $this->website = $website;
    }

    public function store()
    {

        $this->validate();

        $screenshot_url = $this->screenshot->store(path: 'public/photos');
        $screenshot_url = str_replace('public/', 'storage/', $screenshot_url); // Convert path to use 'storage' instead of 'public'


        auth()->user()->issues()->create([
            "page" => $this->page,
            "browser" => $this->browser,
            "screen_size" => $this->screen_size,
            "description" => $this->description,
            "screenshot" => $screenshot_url,
            "website_id" => $this->website->id
        ]);
    }
}
