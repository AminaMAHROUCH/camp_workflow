<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use App\Traits\HasToken;
use \DateTimeInterface;
use App\ResponsibleNews;


class Responsible extends Model
{
    use SoftDeletes;
    use HasToken;

    public $table = 'responsibles';

    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'tel_1',
        'tel_2',
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

     public function responsibleNews()
    {
        return $this->hasMany(ResponsibleNews::class, 'responsible_id');
    }
    
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function getRoleAttribute() 
    {
        return 'responsible';
    }

    public function getResponsibleIdAttribute() 
    {
        return $this->id;
    }

    public function getUKeyAttribute() 
    {
        return base64_encode($this->role . '__' . $this->id);
    }
    
}
