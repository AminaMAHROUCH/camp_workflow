<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Group extends Model
{
    use SoftDeletes;

    public $table = 'groups';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'responsible_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function responsible()
    {
        return $this->belongsTo(GroupResponsible::class, 'responsible_id');
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class);
    }

    public function meeting()
    {
        return $this->hasOne(Meeting::class, 'group_id');
    }
}
