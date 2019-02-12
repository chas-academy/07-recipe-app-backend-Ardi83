<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name'];

    // protected $hidden = ['created_at', 'updated_at'];

    // === Many to Many relations
    
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'ingredient_recipe')->withPivot('amount');
    }
}
