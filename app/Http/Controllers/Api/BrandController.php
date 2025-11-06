<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use App\Http\Resources\BrandResource;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int) $request->integer('per_page', 10);

        $brands = Brand::withCount('products')
            ->orderBy('name')
            ->paginate($perPage)
            ->withQueryString();

        return BrandResource::collection($brands)->additional([
            'meta' => [
                'current_page' => $brands->currentPage(),
                'per_page'     => $brands->perPage(),
                'total'        => $brands->total(),
                'last_page'    => $brands->lastPage(),
            ],
        ]);
    }
}
