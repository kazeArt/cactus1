<?php

// app/Http/Controllers/AdminImageController.php

namespace App\Http\Controllers;

use App\Models\UploadedImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminImageController extends Controller
{
    // Show all uploaded images
    public function index()
    {
        $images = UploadedImage::all();
        return view('admin.images.index', compact('images'));
    }

    // Show form to edit a specific image
    public function edit(UploadedImage $image)
    {
        return view('admin.images.edit', compact('image'));
    }

    // Update the image details (name and file)
    public function update(Request $request, UploadedImage $image)
    {
        $request->validate([
            'original_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Ensure it's an image file
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete the old image from storage
            if (Storage::exists('public/images/' . $image->filename)) {
                Storage::delete('public/images/' . $image->filename);
            }

            // Upload the new image
            $imageFile = $request->file('image');
            $filename = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->storeAs('public/images', $filename);

            // Update the image record with the new filename
            $image->update([
                'filename' => $filename,
            ]);
        }

        // Update the original name
        $image->update([
            'original_name' => $request->original_name,
        ]);

        return redirect()->route('admin.images.index')->with('success', 'Image updated successfully!');
    }
}
