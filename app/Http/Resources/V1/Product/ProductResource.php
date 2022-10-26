<?php

namespace App\Http\Resources\V1\Product;

use Illuminate\Http\Resources\Json\JsonResource;

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
        // return parent::toArray($request);
        // dd();
        return [
            'type' => $this->getTable(),
            'id' => $this->id,
            'attributes' => [
                'product' => $this->product,
                'product_code' => $this->product_code,
                'price' => $this->price,
                'quantity' => $this->pivot->quantity
            ],
            // 'relationships' => new OrderRelationShipResource($this),
        ];
    }
}
