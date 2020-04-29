<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $name = [
        'Daging', 
        'Buah Segar', 
        'Jus', 
        'Sayuran', 
        'Buah Kering',
        'Elektronik',
        'Aksesoris',
        'Laptop',
      ];

      $image = [
        'cat-5.jpg', 
        'cat-1.jpg', 
        'cat-4.jpg', 
        'cat-3.jpg', 
        'cat-2.jpg',
        'cat-6.jpg',
        'cat-7.jpg',
        'cat-6.jpg',
      ];

      $parent_id = [
        null, 
        null, 
        null, 
        null, 
        null,
        null,
        6,
        6,
      ];

      for ($i=0; $i < count($name); $i++) { 
        Category::create([
          'name' => $name[$i],
          'image' => $image[$i],
          'parent_id' => $parent_id[$i]
        ]); 
      }
    }
}
