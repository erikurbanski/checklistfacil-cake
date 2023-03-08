<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CakeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nameCake' => $this->name_cake,
            'weightCake' => $this->weight_cake,
            'value' => $this->value,
            'quantity' => $this->quantity
        ];
    }
}
