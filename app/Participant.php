<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Traits\HasToken;
use \DateTimeInterface;
 
class Participant extends Model
{ 
    use SoftDeletes;
    use HasToken;

    public $table = 'participants';

    protected $hidden = [
        'password',
    ];

    public $appends = [
        'group'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const GENDER_RADIO = [
        'ذكر'  => 'ذكر',
        'أنثى' => 'أنثى',
    ];

    protected $fillable = [
        'name',
        'gender',
        'age',
        'city',
        'tel_1',
        'tel_2',
        'email',
        'password',
        'parent_name',
        'hobbies',
        'created_at',
        'updated_at',
        'deleted_at',
        'visisble_password',
    ];

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function getGroupAttribute() 
    {
        return $this->groups()->first();
    }

    public function getRoleAttribute() 
    {
        return 'participant';
    }
    
    public function getUKeyAttribute() 
    {
        return base64_encode($this->role . '__' . $this->id);
    }
 
}


