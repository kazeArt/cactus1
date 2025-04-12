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
            'image' => 'required|image|max:2048', // max 2MB
        ]);

        $file = $request->file('image');
        $path = $file->store('images', 'public');

        $uploaded = UploadedImage::create([
            'filename' => $path,
            'original_name' => $file->getClientOriginalName(),
        ]);

        return response()->json([
            'message' => 'Image uploaded successfully 📸',
            'data' => $uploaded
        ]);
    }

    public function index()
    {
        return response()->json(UploadedImage::all());
    }
}

