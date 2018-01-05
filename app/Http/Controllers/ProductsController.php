<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class ProductsController extends Controller
{
    public function index(){
      $products = Inventory::all();
      return view('post.index',['products'=>$products]);//products paling kiri merupakan nama file blade.php
    }

    public function showDetail($id)
    {
      $product = Inventory::find($id);
      return view('post.product_details',['product'=>$product]);
    }

    public function showPerCategories()
    {
      // dd(request('category'));
      $category = request('category');
      $products = Inventory::where('category',$category);
      return view('post.products',['products'=>$products]);
    }
}
