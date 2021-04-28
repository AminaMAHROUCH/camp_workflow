<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use App\Traits\HasToken;
use \DateTimeInterface;
use App\Workshop;

class WorkshopResponsible extends Model
{
    use SoftDeletes;
    use HasToken;

    protected $hidden = [
        'password',
    ];

    public $table = 'workshop_responsibles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'city',
        'tel_1',
        'tel_2',
        'email',
        'password',
        'bank_code',
        'created_at',
        'updated_at',
        'deleted_at',
        'visisble_password',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

   public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function getRoleAttribute() 
    {
        return 'workshopResponsible';
    }

     public function workshops()
    {
        return $this->hasMany(Workshop::class, 'responsible_id');
    }

    
}