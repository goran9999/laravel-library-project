<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\AuthorResource;
class BookResource extends JsonResource
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
            'name'=>$this->resource->name,
            'publishinghouse'=>$this->resource->publishinghouse,
            'circulation'=>$this->resource->circulation,
            'category'=>new CategoryResource($this->resource->category),
            'author'=>new AuthorResource($this->resource->author),
            'user'=>new UserResource($this->resource->user)
        ];
    }
}
