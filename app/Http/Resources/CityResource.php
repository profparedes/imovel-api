<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
                'state' => new CityResource($this->whenLoaded('state')),
            ]
        );

        unset(
            $data['created_at'],
            $data['updated_at'],
            $data['state_id'],
        );

        return $data;
    }
}
