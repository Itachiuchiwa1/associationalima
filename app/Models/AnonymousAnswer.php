<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnonymousAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'answer',
        'user_id',
    ];

    public function question()
    {
        return $this->belongsTo(AnonymousQuestion::class, 'question_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
