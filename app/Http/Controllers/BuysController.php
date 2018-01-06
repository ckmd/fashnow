<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\History;

class BuysController extends Controller
{
    public function showKeranjang(){
        return view('post.product_summary');
      }
    public function confirmation(){
      return view('post.confirmation');
    }

    public function prosesTransaksi()
    {
      $user = User::find(request('user_id'));
      
      foreach($user->carts as $cart)
      {
        $history = new History;
        $history->cart_id = $cart->id;
        $history->user_id = $cart->user->id;
        $history->inventory_id = $cart->inventory->id;
        $history->quantity = $cart->quantity;
        $history->save();
      }
      $user->carts()->delete();
      
      return view('post.succeess');
    }
}
