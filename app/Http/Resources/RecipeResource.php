<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'author' => $this->author ? $this->author : 'Uknown source',
            'title' => $this->title,
            'instructure' => $this->instructure,   
            'rating'=> $this->comments->count() > 0 ? 
            round($this->comments->sum('rank')/$this->comments->count(),2) : 'No ratting yet',
            'recipe_link' => route('recipes.show', $this->id),
            'comments_link' => route('comments.index', $this->id),
            'meal_link' => route('meal.index', $this->id),
            'ingredients_link' => route('ingredients.index', $this->id),
            'meal' => [
                'id' => $this->meal->id,
                'recipe_id' => $this->meal->recipe_id, 
                'name' => $this->meal->name,
                'description' => $this->meal->description,
                'country' => $this->meal->country,
                'type' => $this->meal->type,
                'allergic_type' => $this->meal->allergic_type,
                'energy' => $this->meal->energy,
                'preparing_time' => $this->meal->preparing_time,
                'cooking_time' => $this->meal->cooking_time,
                'image' => $this->meal->image,
            ],

            'ingredients' => new IngredientsIdentifierResource($this->ingredients),
            'comments' => new RecipeCommentsRelationshipResource($this->comments)
        ];
    }
}
