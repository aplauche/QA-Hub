<?php

namespace App\Livewire;

use App\Models\Check;
use App\Models\Website;
use Livewire\Component;

class QaMatrix extends Component
{

    public $screen_sizes;
    public $browsers;
    public $matrix;
    public Website $website;
    public $checks = [];

    public function mount()
    {
        $this->screen_sizes = Check::$screen_sizes;
        $this->browsers = Check::$browsers;
        $this->matrix = Check::$matrix;
    }

    public function markIncomplete(int $id)
    {
        $this->website->checks()->find($id)->delete();
    }

    public function markComplete($size, $browser)
    {
        auth()->user()->checks()->create([
            "screen_size" => $size,
            "browser" => $browser,
            "website_id" => $this->website->id,
        ]);
    }

    public function render()
    {
        // Structure the QA checks as an iterable multilevel array
        foreach ($this->matrix as $browser => $enabled_sizes) {
            $this->checks[$browser] = [];
            foreach ($this->screen_sizes as $size) {
                if (in_array($size, $enabled_sizes)) {
                    $match = Check::where("website_id", $this->website->id)
                        ->where("screen_size", $size)
                        ->where("browser", $browser)
                        ->with('user')
                        ->get();
                    $this->checks[$browser][$size] = $match;
                } else {
                    $this->checks[$browser][$size] = false;
                }
            }
        }
        return view('livewire.qa-matrix');
    }
}
