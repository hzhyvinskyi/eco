<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'total_price' => round($this->price - $this->price * $this->discount / 100, 2),
            'rating' => round($this->reviews->sum('star') / $this->reviews->count(), 2),
            'stock' => $this->stock > 0 ? 'in stock' : 'out of stock',
            'link' => route('products.show', $this->id)
        ];
    }
}
