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

    // Store a new link in the database
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'label' => 'required|string',
            'url' => 'required|url',
        ]);

        // Create a new link in the database
        Link::create($request->only('label', 'url'));

        // Redirect back with a success message
        return redirect()->route('admin.links.index')->with('success', 'Link added successfully!');
    }

    // Show the form for editing an existing link
    public function edit($id)
    {
        // Find the link by its ID
        $link = Link::findOrFail($id);

        // Pass the link to the edit view
        return view('admin.links.edit', compact('link'));
    }

    // Update the link in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'label' => 'required|string',
            'url' => 'required|url',
        ]);

        // Find the link by its ID
        $link = Link::findOrFail($id);

        // Update the link with the new data
        $link->update($request->only('label', 'url'));

        // Redirect to the index with a success message
        return redirect()->route('admin.links.index')->with('success', 'Link updated successfully!');
    }

    // Delete a link from the database
    public function destroy($id)
    {
        // Find the link by its ID
        $link = Link::findOrFail($id);

        // Delete the link
        $link->delete();

        // Redirect back to the index with a success message
        return redirect()->route('admin.links.index')->with('success', 'Link deleted successfully!');
    }
}
