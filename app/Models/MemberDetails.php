<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDetails extends Model
{
    use HasFactory;
    protected $table = 'member_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'father',
        'mother',
        'phone',
        'email',
        'presentAddress',
        'permanentAddress',
        'period',

    ];
}
