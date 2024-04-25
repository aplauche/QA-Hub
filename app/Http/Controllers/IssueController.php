<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Website;
use Illuminate\Http\Request;

class IssueController extends Controller
{

    public function index(Website $website)
    {
        $issues = $website->issues()->with('user')->get();

        return view('issues.index', ["issues" => $issues, "website" => $website]);
    }

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
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
