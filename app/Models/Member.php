<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\Models\Collections;

class Member extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = ['order'];

    // Order wise data
    public function scopeOrder($query)
    {
        return $query->orderBy('order', 'ASC');
    }

    // Publish
    public function scopePublish($query)
    {
        return $query->where('status', 1);
    }

    // Image register
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('app_member_image')->width(350)->height(350)->performOnCollections('web_member_image');;
    }
}
