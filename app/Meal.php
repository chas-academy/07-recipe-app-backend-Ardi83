<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = ['name', 'description', 'allergic_type', 'type', 'cooking_time', 'preparing_time', 'image'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
