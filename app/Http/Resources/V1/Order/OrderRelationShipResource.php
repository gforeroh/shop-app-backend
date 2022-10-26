<?php

namespace App\Http\Resources\V1\Order;

use App\Http\Resources\V1\Product\ProductCollection;
use App\Http\Resources\V1\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderRelationShipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return ['product' => new ProductCollection($this->product)];
    }
}
