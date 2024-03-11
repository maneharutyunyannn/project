<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Post_tags extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'tag_id'
    ];
    public function tags()
    {
        return $this->hasOne(Tags::class, 'id', 'tag_id');

    }
    public function posts()
    {
        return $this->hasMany(Tags::class, 'post_id', 'id');

    }
}
