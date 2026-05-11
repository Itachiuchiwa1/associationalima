<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnonymousQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'category',
        'status',
    ];

    public function answers()
    {
        return $this->hasMany(AnonymousAnswer::class, 'question_id');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
