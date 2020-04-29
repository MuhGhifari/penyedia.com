<?php

use Illuminate\Database\Seeder;
use App\FeaturedProduct;

class FeaturedProductSeeder extends Seeder
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
        9,
        10,
        11,
        13,
        14,
      ];

      $index = [
        1,
        2,
        3,
        4,
        5,
        12,
        7,
        11,
        6,
        10,
      ];
        for ($i=0; $i < count($product_id); $i++) { 
          FeaturedProduct::create([
            'product_id' => $product_id[$i],
            'index' => $index[$i]
          ]);
        }
    }
}
