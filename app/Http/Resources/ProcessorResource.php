<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcessorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'number_of_cores' => $this->resource->number_of_cores,
            'is_overclockable' => $this->resource->is_overclockable,
            'architecture' => $this->resource->architecture,
            'frequency' => $this->resource->frequency
        ];
    }

    public static $wrap = 'processor';
}
