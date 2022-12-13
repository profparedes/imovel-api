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
        $data = parent::toArray($request);

        unset(
            $data['district_id'],
            $data['deleted_at']
        );

        $data['district'] = new DistrictResource($this->whenLoaded('district'));
        $data['pictures'] = PictureResource::collection($this->whenLoaded('pictures'));

        return $data;
    }
}
