<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChanceResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'desc' => $this->desc,
            'logo' => asset($this->logo),
            'branches' => $this->branches,
            'outlets' => $this->outlets,
            'provider' => $this->provider,
            'email' => $this->email,
            'link' => $this->link,
            'number' => $this->number,
            'resp' => $this->resp,
            'price' => $this->price,
            'country' => $this->country->name,
            'cat' => $this->cat->name,
            'cat_id' => (int)$this->cat_id,
            'country_id' => (int)$this->country_id,
            'images' => NewChanceImageResource::collection($this->images),
            'imagess' => ChanceImageResource::collection($this->images),
            'user_favs' => count($this->users),
            'is_favourite' => $this->when(auth('sanctum')->check(), function () {
                if (count($this->isFavorited) > 0) {
                    return 1;
                } else {
                    return 0;
                }
            }),
            'clicks' => $this->when(auth('sanctum')->check(), function () {
                return ClickResource::collection($this->clicks);
            }),
            'clicks_no' => $this->when(auth('sanctum')->check(),count($this->clicks))
        ];
    }
}
