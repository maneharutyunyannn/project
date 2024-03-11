<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'phone',
    ];

    public  function carsList()
    {
        return $this->hasMany(UsersCar::class,'user_id','id');
    }
}
