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
}
