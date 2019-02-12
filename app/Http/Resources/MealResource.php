<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
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
            'recipe_id' => $this->recipe_id,
            'name' => $this->name,
            'description' => $this->description,
            'country' => $this->country,
            'type' => $this->type,
            'allergic_type' => $this->allergic_type,
            'energy' => $this->energy,
            'preparing_time' => $this->preparing_time,
            'cooking_time' => $this->cooking_time,
            'image' => $this->image
        ];
    }
}
