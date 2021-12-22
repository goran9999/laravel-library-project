<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='author';
    public function toArray($request)
    {
        return [
            'name'=>$this->resource->firstName,
            'surname'=>$this->resource->lastName,
            'birth_year'=>$this->resource->birthYear,
            'epoch'=>$this->resource->epoch_id
        ];
    }
}
