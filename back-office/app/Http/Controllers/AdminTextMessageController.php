<?php

namespace App\Http\Controllers;

use App\Models\TextMessage;
use Illuminate\Http\Request;

class AdminTextMessageController extends Controller
{

    
    // Show the form to create a new text message
    public function create()
    {
        return view('admin.texts.create');
    }
    
    // Store the text message
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'type' => 'required|in:nav_link,body_title,body_paragraph', // Add validation for type
        ]);
    
        TextMessage::create([
            'content' => $request->content,
            'type' => $request->type, // Save the type
        ]);
    
        return redirect()->route('admin.texts.index')->with('success', 'Texte ajouté avec succès !');
    }
    

    // Get all text messages
    public function index(Request $request)
    {
        $query = TextMessage::query();
    
        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }
    
        $texts = $query->get();
    
        return view('admin.texts.index', compact('texts'));
    }
    

    // Edit a specific text message
    public function edit(TextMessage $text)
    {
        return view('admin.texts.edit', compact('text'));
    }
    
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        return redirect('/'); // Redirect to homepage if not an admin
    }
    // Update a specific text message
    public function update(Request $request, TextMessage $text)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        // Update the text message content and title
        $text->update([
            'content' => $request->content,
        ]);

        return redirect()->route('admin.texts.index')->with('success', 'Text modifié!');
    }
}
