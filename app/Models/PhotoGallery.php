<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "photo_galleries";
    protected $fillable = [
        'title',
        'image',
        'prority',

    ];
}
