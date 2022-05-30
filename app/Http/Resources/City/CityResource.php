<?php

namespace App\Http\Resources\City;

use App\Models\State;
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
        return [
            'city_id' => $this->id,
            'state' => State::whereId($this->state_id)->first(),
            'city_name' => $this->name
        ];
    }
}
