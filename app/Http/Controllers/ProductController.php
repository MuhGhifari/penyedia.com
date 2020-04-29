<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
  public function index($id, $slug){
    $product = Product::find($id);
    $relatedProducts = Product::where('category_id', $product->category->id)->get()->take(4);
    $thumb = $product->images->first();
    return view('product.detail', compact('product', 'thumb', 'relatedProducts'));
  }
}
