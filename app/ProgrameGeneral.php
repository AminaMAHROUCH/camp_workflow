<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class ProgrameGeneral extends Model
{
    public $table = 'programe_general';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'day',
        'titre',
        'contenu',
        'remarque'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
