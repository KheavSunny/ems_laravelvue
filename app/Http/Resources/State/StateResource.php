<?php

namespace App\Http\Resources\State;

use App\Models\Country;
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
        return [
            'state_id' => $this->id,
            'country' => Country::whereId($this->country_id)->first(),
            'state_name' => $this->name
        ];
    }
}
