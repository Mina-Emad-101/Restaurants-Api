<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'url' => $this->url,
            'name' => $this->name,
            'address' => $this->address,
            'number' => $this->number,
            'location' => $this->location->name,
            'cuisines' => CuisineResource::collection($this->whenLoaded('cuisines')),
        ];
    }
}
