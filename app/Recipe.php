<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['author', 'title', 'instructure'];

    // == many to many relatioins
    
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_recipe')->withPivot('amount');
    }
    
    // == one to one relatioins

    public function meal()
    {
        return $this->hasOne(Meal::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
