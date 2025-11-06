<?php

namespace Database\Factories;

use App\Models\ProductDetail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductDetailFactory extends Factory
{
    protected $model = ProductDetail::class;

    public function definition(): array
    {
        return [
            'specs' => [
                'color' => $this->faker->safeColorName(),
                'weight' => $this->faker->randomFloat(2, 0.1, 5) . ' kg',
                'material' => $this->faker->randomElement(['Aluminum','Plastic','Steel','Wood']),
            ],
            // boleh pakai strtoupper(Str::random(8)) atau Str::upper(Str::random(8))
            'sku' => Str::upper(Str::random(8)),
            'stock' => $this->faker->numberBetween(0, 250),
        ];
    }
}
