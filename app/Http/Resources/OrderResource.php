<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user_id' => $this->user_id,
            'chance_id' => $this->chance_id,
            'created_at' => $this->created_at->diffForHumans(),
            'user_name' => $this->user->name,
            'user_number' => $this->user->number,
            'chance_title' => $this->chance->title,
            'chance_logo' => asset($this->chance->logo)
        ];
    }
}
