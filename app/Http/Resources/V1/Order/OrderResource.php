<?php

namespace App\Http\Resources\V1\Order;

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
        // return parent::toArray($request);
        return [
            'type' => $this->getTable(),
            'id' => $this->id,
            'attributes' => [
                'date_order' => $this->date_order,
                'client' => $this->client,
                'document' => $this->document
            ],
            'links' => [
                    'self' => route('order.show', ['id' => $this->id])
            ],
            'relationships' => new OrderRelationShipResource($this)
        ];
    }
}
