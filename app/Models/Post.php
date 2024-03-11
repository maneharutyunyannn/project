<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'src',
        'cat_id'
    ];
    public  function categories()
    {
        return $this->hasOne(Categories::class, 'id', 'cat_id');
    }
    public  function tagsRelation()
    {
        return $this->hasMAny(Post_tags::class, 'post_id', 'id')->with('tags');
    }
}
