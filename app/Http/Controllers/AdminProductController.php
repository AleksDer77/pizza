<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\Admin\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminProductController extends Controller
{
    public function index(): ?AnonymousResourceCollection
    {
       return ProductResource::collection(Product::all());
    }
}
