<?php


namespace App\Http\Controllers;

use App\Models\TextMessage;
use Illuminate\Http\Request;

class AdminTextMessageController extends Controller
{
    // Store a new text message
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'content' => 'required|string',
        ]);

        $textMessage = TextMessage::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.texts.index')->with('success', 'Text saved successfully!');
    }

    // Get all text messages
    public function index()
    {
        $texts = TextMessage::all();
        return view('admin.texts.index', compact('texts'));
    }

    // Edit a specific text message
    public function edit(TextMessage $text)
    {
        return view('admin.texts.edit', compact('text'));
    }

    // Update a text message
    public function update(Request $request, TextMessage $text)
    {
        $request->validate([
            'title' => 'nullable|string',
            'content' => 'required|string',
        ]);

        $text->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.texts.index')->with('success', 'Text updated successfully!');
    }

    // Delete a specific text message
    public function destroy(TextMessage $text)
    {
        $text->delete();
        return redirect()->route('admin.texts.index')->with('success', 'Text deleted successfully!');
    }
}
