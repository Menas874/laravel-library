<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['name'];

    public function resources()
    {
        return $this->hasMany('App\Resource');
    }

    public function scopeSearchCategory($query, $name)
    {
        return $query->where('name', $name);
    }
}
