<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /*
     * Model relations attachments
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

}
