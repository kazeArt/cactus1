<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

namespace App\Http\Controllers\API;

use App\Models\TextMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TextMessageController extends Controller
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

        return response()->json([
            'message' => 'Text saved successfully 💌',
            'data' => $textMessage
        ]);
    }

    // Get all text messages
    public function index()
    {
        $texts = TextMessage::all();
        return response()->json($texts);
    }
}

