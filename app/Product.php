<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
      return $this->belongsTo('App\Category', 'category_id');
    }

    public function featured(){
      return $this->hasMany('App\FeaturedProduct', 'product_id');
    }

    public function images(){
      return $this->hasMany('App\ProductImage', 'product_id');
    }

    public function thumbnail(){
      $images = [];
      foreach ($this->images as $image) {
        array_push($images, $image->name);
      }
      return reset($images);
    }
}
