<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['headline', 'body', 'rank'];

    protected $hidden = ['created_at', 'updated_at'];
    // === One to Many relatioins
    
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
