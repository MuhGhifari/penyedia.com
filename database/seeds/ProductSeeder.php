<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 

      $name = [
        'Daging Cincang',
        'Pisang',
        'Jambu',
        'Anggur',
        'Hamburger',
        'Mangga',
        'Semangka',
        'Apel',
        'Kurma',
        'Ayam Goreng',
        'Jus Jeruk',
        'Buah-buahan beraneka ragam',
        'Casing HP',
        'Laptop bagus',
      ];

      $category_id = [1,2,2,2,1,2,2,2,5,1,3,2,7,8];

      $price = [
        10000,
        20000,
        20000,
        20000,
        10000,
        20000,
        20000,
        20000,
        50000,
        10000,
        30000,
        20000,
        70000,
        8000000,
      ];

      $weight = 2;

      $minimum = 1;

      $summary = [
        'Ini adalah summary dari produk Daging Cincang',
        'Ini adalah summary dari produk Pisang',
        'Ini adalah summary dari produk Jambu',
        'Ini adalah summary dari produk Anggur',
        'Ini adalah summary dari produk Hamburger',
        'Ini adalah summary dari produk Mangga',
        'Ini adalah summary dari produk Semangka',
        'Ini adalah summary dari produk Apel',
        'Ini adalah summary dari produk Kurma',
        'Ini adalah summary dari produk Ayam Goreng',
        'Ini adalah summary dari produk Jus Jeruk',
        'Ini adalah summary dari produk Buah-buahan beraneka ragam',
        'Ini adalah summary dari produk aksesoris casing hp',
        'Ini adalah summary dari produk laptop',
      ];

      $description = [
        'Ini adalah deskripsi dari produk Daging Cincang',
        'Ini adalah deskripsi dari produk Pisang',
        'Ini adalah deskripsi dari produk Jambu',
        'Ini adalah deskripsi dari produk Anggur',
        'Ini adalah deskripsi dari produk Hamburger',
        'Ini adalah deskripsi dari produk Mangga',
        'Ini adalah deskripsi dari produk Semangka',
        'Ini adalah deskripsi dari produk Apel',
        'Ini adalah deskripsi dari produk Kurma',
        'Ini adalah deskripsi dari produk Ayam Goreng',
        'Ini adalah deskripsi dari produk Jus Jeruk',
        'Ini adalah deskripsi dari produk Buah-buahan beraneka ragam',
        'Ini adalah deskripsi dari produk aksesoris casing hp',
        'Ini adalah deskripsi dari produk laptop',
      ];

      $status = [
        'In Stock',
        'In Stock',
        'In Stock',
        'In Stock',
        'In Stock',
        'Out of Stock',
        'In Stock',
        'Out of Stock',
        'In Stock',
        'In Stock',
        'In Stock',
        'In Stock',
        'In Stock',
        'In Stock',
      ];      
        for ($i=0; $i < count($name); $i++) { 
          Product::create([
            'name' => $name[$i],
            'category_id' => $category_id[$i],
            'price' => $price[$i],
            'weight' => $weight,
            'minimum' => $minimum,
            'summary' => $summary[$i],
            'description' => $description[$i],
            'status' => $status[$i],
          ]);
        }
    }
}
