<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['title','img','body','slug','section_id' ,'text'];
    //tags_meta,description_meta,rating
    //amp.blade
    //pages

    public function section(){
        return $this->belongsTo('App\Section');
    }
    public function images(){
        return $this->hasMany('App\Image');
    }
     public function comments(){
        return $this->hasMany('App\Comment');
    }
     public function tag()
    {
        return $this->belongsToMany('App\Tag', 'post_tag');
    }   
    
     
}