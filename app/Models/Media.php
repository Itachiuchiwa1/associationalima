<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'gallery_id',
        'type',
        'path',
        'thumbnail_path',
        'title',
        'order',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
