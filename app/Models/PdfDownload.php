<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfDownload extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'pdf_downloads';
    protected $fillable = [
        'title',
        'image',

    ];
}
