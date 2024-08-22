<?php

namespace App\Http\Controllers\Commons;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        return view('main.dashboard');
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        abort(404);
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        abort(404);
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
