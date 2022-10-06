<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'form_id',
        'uuid',
        'created_at',
    ];
    use HasFactory;

    /*
     * Model relations attachments
     */
    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function responses()
    {
        return $this->belongsToMany(Response::class)->withPivot('submission_id', 'response_id');
    }

}
