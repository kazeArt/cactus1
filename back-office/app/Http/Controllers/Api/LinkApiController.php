<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkApiController extends Controller
{
    // Fetch all links (publicly accessible)
    public function index()
    {
        // Retrieve all links from the database
        $links = Link::all();

        // Return them as a JSON response
        return response()->json($links);
    }

    // Store a new link (requires authentication)
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'label' => 'required|string',
            'url' => 'required|url',
        ]);

        // Create a new link in the database
        $link = Link::create($request->only('label', 'url'));

        // Return a success message with the newly created link
        return response()->json($link, 201);
    }
}
