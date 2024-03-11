<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $fillable = [
        'tag'
    ];

    public  function tag_id()
    {
        return $this->hasMAny(Post_tags::class, 'tag_id', 'id');
    }

}
