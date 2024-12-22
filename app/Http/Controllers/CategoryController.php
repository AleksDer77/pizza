<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $products = Category::with([
            'products' => function ($query) {
                $query->where('available', true)
                    ->where('featured', true)
                    ->limit(2);
            },
        ])->paginate(2);

        return CategoryResource::collection($products);
    }

    public function show($id): CategoryResource
    {
        $products = Category::findOrFail($id)->load([
            'products' => fn ($query) => $query->where('available', true),
        ]);
        dd($products);

        return new CategoryResource($products);
    }
}
