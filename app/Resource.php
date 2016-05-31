<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Resource extends Model implements SluggableInterface
{
  use SluggableTrait;

  protected $sluggable = [
      'build_from' => 'title',
      'save_to'    => 'slug',
  ];

  protected $table = "resources";
  protected $fillable = ['title', 'author', 'editorial', 'content', 'category_id', 'user_id'];

// un recurso solo puede tener una categoria por eso esta en singular
  public function category()
  {
      return $this->belongsTo('App\Category');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }

// relacion 1 a 1 ver laravel 5.1 docs
  public function book()
   {
       return $this->hasOne('App\Book');
   }

   public function tags()
   {
       return $this->belongsToMany('App\Tag');
   }

   public function scopeSearch($query, $title)
   {
     return $query->where('title', 'LIKE', "%$title%");
   }

   public static function filterAndPaginate($title)
   {
      return Resource::search($title)
                     ->orderBy('id','DESC')
                     ->paginate(10);
   }

}
