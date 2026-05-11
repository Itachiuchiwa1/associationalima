<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'order',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
