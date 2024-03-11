<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Categories extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'name',
        'parent_id'
    ];

    public  function posts()
    {
        return $this->hasMany(Post::class,'cat_id','id');
    }
  
    public function catSubsection(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'parent_id');
    }
}
