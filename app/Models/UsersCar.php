<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersCar extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_model',
        'plate',
        'user_id',
    ];



}
