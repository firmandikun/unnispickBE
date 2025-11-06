<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Brand;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
  public function index(Request $request)
    {
        $perPage = (int) $request->integer('per_page', 5);
        $brandId = $request->integer('brand_id');

        $query = Product::query()->with(['brand','detail'])->orderBy('name');
        if ($brandId) {
            $query->where('brand_id', $brandId);
        }

        $products = $query->paginate($perPage)->withQueryString();

        return ProductResource::collection($products);
    }

   public function byBrand(Request $request, Brand $brand)
    {
        $perPage = (int) $request->integer('per_page', 5);

        $products = Product::with(['brand','detail'])
            ->where('brand_id', $brand->id)
            ->orderBy('name')
            ->paginate($perPage)
            ->withQueryString();

        return ProductResource::collection($products)->additional([
            'meta' => [
                'brand'        => $brand->loadCount('products'),
                'current_page' => $products->currentPage(),
                'per_page'     => $products->perPage(),
                'total'        => $products->total(),
                'last_page'    => $products->lastPage(),
            ],
        ]);
    }

    public function show(Product $product)
    {
        $product->load(['brand','detail']);
        return new ProductResource($product);
    }
}
