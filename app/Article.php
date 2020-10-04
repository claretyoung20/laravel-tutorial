<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

//    public function getRouteKeyName()
//    {
//        return 'title';
//    }

      protected $fillable = ['title', 'excerpt', 'body'];

      public function path()
      {
          return route('articles.show', $this);
      }

}
