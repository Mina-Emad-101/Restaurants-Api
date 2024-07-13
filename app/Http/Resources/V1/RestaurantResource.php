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
            'id' => $this->id,
            'url' => $this->url,
            'name' => $this->name,
            'address' => $this->address,
            'number' => $this->number,
            'location' => $this->location->name,
            'timings' => json_decode($this->timings),
            'cuisines' => CuisineResource::collection($this->whenLoaded('cuisines')),
        ];
    }
}
