<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id, 
            'title' => $this->title,
            'content' => $this->content, 
            'delegate' => $this->delegate->name,
            'delegator' => $this->delegator->name, 
            'deadline' => $this->deadline, 
            'status' => $this->status->title, 
        ];
    }
}
