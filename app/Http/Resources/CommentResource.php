<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'headline' => $this->headline ? $this->headline : 'No headline!',
            'body' => $this->body,
            'rank' => $this->rank ? $this->rank : 'No rank!'

        ];
    }
}
