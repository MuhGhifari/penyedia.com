<?php

use Illuminate\Database\Seeder;
use App\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_id = [
          1,
          2,
          3,
          4,
          5,
          6,
          7,
          8,
          9,
          10,
          11,
          12,
          13,
          13,
          13,
          14,
          14,
          14,
        ];

        $name = [
          'product-1.jpg',
          'product-2.jpg',
          'product-3.jpg',
          'product-4.jpg',
          'product-5.jpg',
          'product-6.jpg',
          'product-7.jpg',
          'product-8.jpg',
          'product-9.jpg',
          'product-10.jpg',
          'product-11.jpg',
          'product-12.jpg',
          'product-13-img1.jpg',
          'product-13-img2.jpg',
          'product-13-img3.jpg',
          'product-14-img1.jpg',
          'product-14-img2.jpg',
          'product-14-img3.jpg',
        ];

        for ($i=0; $i < count($name); $i++) { 
          ProductImage::create([
            'product_id' => $product_id[$i],
            'name' => $name[$i],
          ]);
        }
    }
}
