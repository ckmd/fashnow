<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Cart;

class ProductsController extends Controller
{
    public function index(){
      $products = Inventory::all();
      return view('post.index',['products'=>$products]);//products paling kiri merupakan nama file blade.php
     }
     public function showProducts(){
       $products = Inventory::all();
       return view('post.products',['products'=>$products]);
     }

    public function showDetail($id)
    {
    $product = Inventory::find($id);
      return view('post.product_details',['product'=>$product]);
    }

    public function calculate()
    {
      $id = request('inventory_id');

      $product = Inventory::find($id);
      if (request('quantity') >= 0 && request()->has('quantity') && $product->stock - request('quantity') >= 0){
        $quantity = request('quantity');
        $user_id = request('user_id');

        $cart = Cart::firstOrNew([
          'user_id' => $user_id,
          'inventory_id' => $id
        ]);
        $cart->quantity += request('quantity');
        $cart->save();
        $product->stock -= request('quantity');
        $product->save();
        $errors = [
          'id' => 0,
          'message' => ''
        ];
      }else{
        $errors = [
          'id' => 1,
          'message' => 'Stok tidak cukup !!'
        ];
      }

      $data = [
        'product' => $product,
        'error' => $errors
      ];

      return json_encode($data);
      // return view('post.product_details',['product'=>$product]);
    }

    public function showPerCategories()
    {
      if (request()->has('search') && request('search') != '')
      {

        $request = request('search');
        $products = Inventory::where('name','like','%'.$request.'%')->get();
        
      }else if (request()->has('category')){
        $request = request('category');
        $products = Inventory::where('category',$request)->get();
        // TODO implementasi Jika Search
      }
      
      return view('post.products',['products' => $products, 'test'=>'halo bro']);
    }
}
