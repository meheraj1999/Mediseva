<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialActivites extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "social_activites";
    protected $fillable = [
        'title',
        'image',
        'description',
        'prority',

    ];
}
