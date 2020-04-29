<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class ShopController extends Controller
{
  public function index(){
    $products = Product::paginate(8);
    $categories = Category::all();
    return view('shop.index', compact('products', 'categories'));
  }

  public function categories($id, $slug){
    $allProducts = Product::where('category_id', $id)->get(); // without pagination
    $products = Product::where('category_id', $id)->paginate(6);
    $category = Category::find($id);
    foreach ($category->child as $subcat) {
      foreach ($subcat->products as $newProduct) {
        $allProducts->push($newProduct);
        $products->push($newProduct);
      }
    }
    $latestProducts = $allProducts->sortBy('created_at')->take(6);
    $categories = Category::where('id', '!=', $id)->get();
    return view('shop.categories', compact('products', 'category', 'categories', 'latestProducts'));
  }

  public function subcategories($id, $parent_id, $slug ){
    $allProducts = Product::where('category_id', $id)->get(); // without pagination
    $products = Product::where('category_id', $id)->paginate(6);
    $category = Category::find($id);
    $parent_cat = Category::find($parent_id);
    $latestProducts = $allProducts->sortBy('created_at')->take(6);
    $categories = Category::where('id', '!=', $parent_id)->get();
    return view('shop.subcategories', compact('products', 'category', 'categories', 'latestProducts', 'parent_cat'));
  }
}
