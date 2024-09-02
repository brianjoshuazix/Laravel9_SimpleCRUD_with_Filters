<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=[];

   public function tags(){
   	return $this->belongsToMany('App\Models\Tag');
   }

   public function user(){
   	return $this->belongsTo('App\Models\User');
   }

   public function category(){
   	return $this->belongsTo('App\Models\Category');
   }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function getTagsIdArray(){
     $id_array=[];
     
     if(count($this->tags)){

      foreach ($this->tags as $tag) {
       $id_array[]=$tag->id;
      }

     }

     return $id_array;
    }
}
