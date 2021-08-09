<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    use HasFactory;
    protected $table = "appoinments";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'number',
        'age',
        'gender',
        'dob',
        'depertment',
        'doctor_name',
        'hospital',
        'type',
        'comment',
       
    ];
}
