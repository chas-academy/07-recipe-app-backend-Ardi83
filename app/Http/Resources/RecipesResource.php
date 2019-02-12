<?php

namespace App\Http\Resources;

use App\http\Resources\RecipeResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipesResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  RecipeResource::collection($this->collection);
        
    }

    // public function with($request)
    // {
    //     return [
    //         'links' => [
    //             'self' => route('recipes.index')
    //         ]
    //         ];
    // }
}
