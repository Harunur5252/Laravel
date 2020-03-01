<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $category=Category::all();
        $product=Product::where('publication_status',1)
            //->orderBy('id','desc')
            ->inRandomOrder()
            ->get();
        return view('karma.home.Home',[
            'category'=>$category,
            'product'=>$product
        ]);
    }
    public function category()
    {
        return view('karma.category.category');
    }
}
