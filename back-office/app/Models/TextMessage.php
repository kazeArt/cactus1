<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextMessage extends Model
{
    use HasFactory;

    // Add title and content to the fillable property
    protected $fillable = [
        'content',
        'type',
    ];
    
}
