<?php

namespace App\Models;

use App\Exceptions\InvalidEntrySlugException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Entry extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title']= $title;
        $this->attributes['slug']= Str::slug($title);

    }
    public function getUrl(){
        return  'entries/'.$this->slug.'-'.$this->id;
    }
}
