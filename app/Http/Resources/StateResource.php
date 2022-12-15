<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
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
                'cities' => CityResource::collection($this->whenLoaded('cities')),
            ]
        );

        unset(
            $data['created_at'],
            $data['updated_at']
        );

        return $data;
    }
}
