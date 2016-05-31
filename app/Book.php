<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $table = "books";
  protected $fillable = ['name', 'resource_id'];

  public function resource()
     {
         return $this->belongsTo('App\Resource');
     }
}
