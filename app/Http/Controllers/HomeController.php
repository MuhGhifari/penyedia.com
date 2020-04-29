<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\FeaturedProduct;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $latestProducts = Product::orderBy('created_at', 'ASC')->get();
        $categories = Category::all();
        $featuredProducts = FeaturedProduct::orderBy('index', 'asc')->get();
        $featuredProductsCatArr = [];
        foreach ($featuredProducts as $fp) {
            array_push($featuredProductsCatArr, $fp->product->category);
        }
        $featuredProductsCat = array_unique($featuredProductsCatArr);
        // dd($featuredProductsCat);
        return view('home', compact('products', 'categories', 'featuredProducts', 'featuredProductsCat', 'latestProducts'));
    }


    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function adminHome(){
        return view('adminHome');
    }
}
