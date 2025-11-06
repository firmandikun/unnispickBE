<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $brands = [
            ['name' => 'Lumière Beauty', 'logo' => 'https://picsum.photos/seed/lumiere/96/96'],
            ['name' => 'Auralis Skincare', 'logo' => 'https://picsum.photos/seed/auralis/96/96'],
            ['name' => 'Velvette Cosmetics', 'logo' => 'https://picsum.photos/seed/velvette/96/96'],
            ['name' => 'PureGlow Organics', 'logo' => 'https://picsum.photos/seed/pureglow/96/96'],
            ['name' => 'Natura Bliss', 'logo' => 'https://picsum.photos/seed/naturabliss/96/96'],
        ];

        $productImages = [
            'https://wordpressunnis.s3.ap-southeast-1.amazonaws.com/images/feed/thumbnail/68e8a61dd6e5f0f36d5e18ce.webp',
            'https://wordpressunnis.s3.ap-southeast-1.amazonaws.com/images/feed/thumbnail/68e8a549d6e5f0f36d5e18cd.webp',
            'https://wordpressunnis.s3.ap-southeast-1.amazonaws.com/images/feed/thumbnail/68e8a376d6e5f0f36d5e18cb.webp',
            'https://wordpressunnis.s3.ap-southeast-1.amazonaws.com/images/feed/thumbnail/68e8a293d6e5f0f36d5e18ca.webp',
            'https://wordpressunnis.s3.ap-southeast-1.amazonaws.com/images/feed/thumbnail/68e89ff4d6e5f0f36d5e18c8.webp',
            'https://wordpressunnis.s3.ap-southeast-1.amazonaws.com/images/feed/thumbnail/68e8a0c3d6e5f0f36d5e18c9.webp',
            'https://wordpressunnis.s3.ap-southeast-1.amazonaws.com/images/feed/thumbnail/68e8a0c3d6e5f0f36d5e18c9.webp',
            'https://wordpressunnis.s3.ap-southeast-1.amazonaws.com/images/feed/thumbnail/68e89ff4d6e5f0f36d5e18c8.webp',
        ];

        foreach ($brands as $b) {
            $brand = Brand::create([
                'name' => $b['name'],
                'slug' => Str::slug($b['name']),
                'logo_url' => $b['logo'],
            ]);

            $products = [
                [
                    'name' => 'Hydra Glow Serum',
                    'description' => 'Serum pelembap dengan kandungan hyaluronic acid dan vitamin C untuk kulit cerah bercahaya.',
                    'price' => 185000,
                ],
                [
                    'name' => 'Radiant Day Cream SPF 30',
                    'description' => 'Krim siang dengan perlindungan sinar UV dan formula ringan yang menutrisi kulit.',
                    'price' => 149000,
                ],
                [
                    'name' => 'Silky Matte Lip Cream',
                    'description' => 'Lip cream tahan lama dengan hasil matte lembut dan warna intens.',
                    'price' => 99000,
                ],
                [
                    'name' => 'Perfect Brow Definer',
                    'description' => 'Pensil alis mikro-presisi untuk tampilan alis alami dan tahan air.',
                    'price' => 79000,
                ],
                [
                    'name' => 'Renewal Night Cream',
                    'description' => 'Krim malam dengan retinol dan peptide complex untuk membantu regenerasi kulit.',
                    'price' => 165000,
                ],
            ];

            foreach ($products as $index => $p) {
                $product = Product::create([
                    'brand_id' => $brand->id,
                    'name' => $p['name'],
                    'slug' => Str::slug($brand->name . '-' . $p['name']),
                    'description' => $p['description'],
                    'price' => $p['price'],
                    'thumbnail_url' => $productImages[$index % count($productImages)],
                ]);

                ProductDetail::create([
                    'product_id' => $product->id,
                    'sku' => strtoupper(Str::random(8)),
                    'stock' => fake()->numberBetween(30, 150),
                    'specs' => [
                        'volume' => fake()->randomElement(['15ml', '30ml', '50ml', '100ml']),
                        'made_in' => fake()->randomElement(['Korea', 'Japan', 'Indonesia', 'France']),
                        'skin_type' => fake()->randomElement(['Normal', 'Dry', 'Oily', 'Combination']),
                    ],
                ]);
            }
        }

        $this->command->info('✅ Kosmetik brands & products seeded successfully with real images!');
    }
}
