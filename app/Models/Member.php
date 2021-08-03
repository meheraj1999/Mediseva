<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'members';
    protected $fillable = [
        'name',
        'image',
        'designation',
        'member_id',
        'priority',
        'type',

    ];
    public function details()
    {
        return $this->hasOne(MemberDetails::class, 'member_id');
    }
}
