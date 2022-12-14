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
        $data = array_merge(
            parent::toArray($request),
            [
                'location' => new DistrictResource($this->whenLoaded('district')),
                'pictures' => PictureResource::collection($this->whenLoaded('pictures')),
            ]
        );

        unset(
            $data['district'],
            $data['district_id'],
            $data['deleted_at']
        );

        return $data;
    }
}
