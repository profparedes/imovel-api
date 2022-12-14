<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DistrictResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = array_merge(
            parent::toArray($request),
            [
                'city' => new CityResource($this->whenLoaded('city')),
            ]
        );

        unset(
            $data['created_at'],
            $data['updated_at'],
            $data['city_id'],
        );

        return $data;
    }
}
