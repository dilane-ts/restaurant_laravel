<?php

namespace App\Actions\Product;

use App\Models\Product;
use Illuminate\Support\Collection;

class GetCartAction
{
    public function __invoke(array | null $cart): Collection
    {
        return collect($cart)->map(function ($item) {
            $object = new \stdClass();
            $object->product_id = $item['product_id'];
            $object->quantity = $item['quantity'];
            $object->product = Product::find($item['product_id']);
            return $object;
        });
    }
}
