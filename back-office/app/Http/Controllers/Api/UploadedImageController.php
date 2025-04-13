<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UploadedImage;
use Illuminate\Support\Facades\Storage;

class UploadedImageController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,jfif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $path = $file->store('images', 'public'); // Save to storage/app/public/images
        $uploaded = UploadedImage::create([
            'filename' => basename($path),
            'original_name' => $file->getClientOriginalName(),
        ]);

        return response()->json(['success' => true, 'data' => $uploaded], 201);
    }

    return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
}

    public function index()
    {
        return response()->json(UploadedImage::all());
    }
}

