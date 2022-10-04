<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'question',
        'type_id',
        'choice_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function choices()
    {
        return $this->belongsToMany(Choice::class)->withPivot('question_id', 'choice_id');
    }
}
