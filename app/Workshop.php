<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Workshop extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'workshops';

    protected $appends = [
        'images',
    ];

    protected $dates = [
        'start_at',
        'end_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'content',
        'start_at',
        'end_at',
        'quiz',
        'responsible_id',
        'evaluation',
        'created_at',
        'updated_at',
        'deleted_at',
        'video',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImagesAttribute()
    {
        $files = $this->getMedia('images');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getExcerptAttribute()
    {
        return mb_substr($this->attributes['content'], 0, 100).'...';
    }


    public function getImagesUrlsAttribute()
    {
        $urls = [];
        foreach ($this->images as $key => $image) {
            $urls[] = asset($image->getUrl());
        }

        return $urls;
    }
 
    public function getStartAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartAtAttribute($value)
    {
        $this->attributes['start_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndAtAttribute($value)
    {
        $this->attributes['end_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function responsible()
    {
        return $this->belongsTo(WorkshopResponsible::class, 'responsible_id');
    }

    public function getDurationAttribute()
    {
        $start = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['start_at']);
        $end = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['end_at']);
        return $start->diff($this->end)->format('%H:%I');
    }
}