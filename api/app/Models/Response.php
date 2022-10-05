<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'response',
        'question_id',
    ];

    public function choices()
    {
        return $this->belongsToMany(Choice::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
