<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    // Display all links in the admin panel
    public function index()
    {
        // Get all links from the database
        $links = Link::all();

        // Pass links to the view
        return view('admin.links.index', compact('links'));
    }
    // Show the form for editing an existing link
    public function edit(Link $link)
    {
        // Pass the link to the edit view
        return view('admin.links.edit', compact('link'));
    }

    // Update the link in the database
    public function update(Request $request, Link $link)
    {
        // Validate the incoming request
        $request->validate([
            'label' => 'required|string',
            'url' => 'required|url',
        ]);

        // Update the link with the new data
        $link->update($request->only('label', 'url'));

        // Redirect to the index with a success message
        return redirect()->route('admin.links.index')->with('success', 'Link updated successfully!');
    }
}
