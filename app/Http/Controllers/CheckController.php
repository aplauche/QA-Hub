<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\Website;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Website $website, Request $request)
    {

        $inputs = $request->validate([
            "browser" => "required|string",
            "size" => "required|int",
        ]);

        // dd($inputs);

        auth()->user()->checks()->create([
            "browser" => $inputs["browser"],
            "screen_size" => $inputs["size"],
            "website_id" => $website->id,
        ]);


        return redirect()->route("websites.show", ["website" => $website]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Check $check)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Check $check)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Check $check)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Website $website, Check $check)
    {
        $check->delete();
        return redirect()->route("websites.show", ["website" => $website]);
    }
}
