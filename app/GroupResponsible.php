<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use App\Traits\HasToken;
use App\Group;
use \DateTimeInterface;

class GroupResponsible extends Model
{
    use SoftDeletes;
    use HasToken;

    protected $hidden = [
        'password',
    ];

    public $table = 'group_responsibles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     public $appends = [
        'group'
    ];

    protected $fillable = [
        'name',
        'city',
        'tel_1',
        'tel_2',
        'email',
        'password',
        'bank_code',
        'responsible_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'visisble_password',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function responsible()
    {
        return $this->belongsTo(Responsible::class, 'responsible_id');
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }
 
    public function groupNews()
    {
        return $this->hasMany(GroupNews::class, 'responsible_id');
    }
    public function groups()
    {
        return $this->hasOne(Group::class, 'responsible_id');
    }
     public function getGroupAttribute() 
    {
        return $this->groups()->first();
    }

    public function getRoleAttribute() 
    {
        return 'groupResponsible';
    }

    public function getUKeyAttribute() 
    {
        return base64_encode($this->role . '__' . $this->id);
    }
}