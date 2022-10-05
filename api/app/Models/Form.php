<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'entitled',
        'description',
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }


}
