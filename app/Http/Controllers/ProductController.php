<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::query()->findOrFail($id);

        return new ProductResource($product);
    }
}
