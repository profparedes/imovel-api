<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PictureResource extends JsonResource
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
            $data['created_at'],
            $data['updated_at'],
            $data['property_id'],
            $data['id']
        );

        return $data;
    }
}
