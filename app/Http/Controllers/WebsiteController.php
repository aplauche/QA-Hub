<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Website $website)
    {
        // for performance potentially preload checks?
        // $checks = $website->checks()->with('user')->get();

        $issue_count = $website->issues()->count();
        $completed_count = $website->issues()->where("completed", true)->count();

        // constant definitions for the checks
        $screen_sizes = Check::$screen_sizes;
        $browsers = Check::$browsers;
        $matrix = Check::$matrix;

        $checks = [];

        // Structure the QA checks as an iterable multilevel array
        foreach ($matrix as $browser => $enabled_sizes) {
            $checks[$browser] = [];
            foreach ($screen_sizes as $size) {
                if (in_array($size, $enabled_sizes)) {
                    $match = Check::where("website_id", $website->id)
                        ->where("screen_size", $size)
                        ->where("browser", $browser)
                        ->with('user')
                        ->get();
                    $checks[$browser][$size] = $match;
                } else {
                    $checks[$browser][$size] = false;
                }
            }
        }

        //dd($checks);


        return view('websites.show', [
            "checks" => $checks,
            "website" => $website,
            "screen_sizes" => $screen_sizes,
            "browsers" => $browsers,
            "checks" => $checks,
            "issue_count" => $issue_count,
            "completed_count" => $completed_count
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Website $website)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Website $website)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Website $website)
    {
        //
    }
}
