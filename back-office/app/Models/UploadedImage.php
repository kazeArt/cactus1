<?php

// app/Models/UploadedImage.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedImage extends Model
{
    use HasFactory;

    protected $fillable = ['filename', 'original_name'];

    // Optionally, you can add accessor for the image URL if needed:
    public function getUrlAttribute()
    {
        return asset('storage/images/' . $this->filename);
    }
}

