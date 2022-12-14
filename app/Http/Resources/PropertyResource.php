<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
                    'id' => $this->id,
                    'title' => $this->title,
                    'type' => $this->type,
                    'description' => $this->description,
                    'location' => [
                        'address' => $this->address,
                        'lat_address' => $this->lat_address,
                        'lng_address' => $this->lng_address,
                        'district' => new DistrictResource($this->whenLoaded('district')),
                    ],
                    'is_rent' => $this->is_rent,
                    'is_sale' => $this->is_sale,
                    'rent_value' => $this->rent_value,
                    'sale_value' => $this->sale_value,
                    'is_furnished' => $this->is_furnished,
                    'is_pet_friendly' => $this->is_pet_friendly,
                    'bathrooms' => $this->bathrooms,
                    'bedrooms' => $this->bedrooms,
                    'parking' => $this->parking,
                    'total_area' => $this->total_area,
                    'useful_area' => $this->useful_area,
                    'has_party_hall' => $this->has_party_hall,
                    'has_square' => $this->has_square,
                    'has_gym' => $this->has_gym,
                    'has_pool' => $this->has_pool,
                    'photos' => PictureResource::collection($this->whenLoaded('pictures')),
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                ];

        unset(
            $data['district_id'],
            $data['deleted_at']
        );

        return $data;
    }
}
