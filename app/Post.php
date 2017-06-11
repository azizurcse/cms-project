<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable=['title','body','path'];
    protected $dates=['deleted_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->morphMany(Photo::class,'imageable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }

    public static function scopeLatest($query){
        return $query->orderBy('id','asc')->get();
    }
}
