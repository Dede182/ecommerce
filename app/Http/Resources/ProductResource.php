<?php

namespace App\Http\Resources;

use App\Helpers\MbCalculate;
use Illuminate\Http\Resources\Json\JsonResource;

use function PHPUnit\Framework\isNull;

class ProductResource extends JsonResource
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
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
            'discount' => $this->when($request->discount,$this->discount),
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'rating' => $this->whenNotNull( MbCalculate::review($this->id)),
            'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
