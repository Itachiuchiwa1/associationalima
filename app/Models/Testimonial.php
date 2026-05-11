<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_name',
        'author_role',
        'author_image',
        'content',
        'rating',
        'status',
    ];

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }
}
