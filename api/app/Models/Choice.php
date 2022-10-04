<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'response',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function submission()
    {
        return $this->hasMany(Submission::class);
    }

    public function response()
    {
        return $this->hasMany(Response::class);
    }
}
