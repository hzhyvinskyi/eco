<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'details' => $this->description,
            'price' => $this->price,
            'discount' => $this->discount,
            'total_price' => round($this->price - $this->price * $this->discount / 100, 2),
            'rating' => $this->reviews->count() > 0 ?
                round($this->reviews->sum('star') / $this->reviews->count(), 2) : 'No rating',
            'stock' => $this->stock > 0 ? $this->stock : 'Not in stock',
            'reviews' => route('reviews.index', $this->id)
        ];
    }
}
