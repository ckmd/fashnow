<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    public function printNota(){
      return redirect('/dompdf.php');
    }

    public function prosesTransaksi()
    {
      $user = User::find(request('user_id'));
      (string)$id = $user->user_id;
      File::put('nota'.$id.'.html',view('layouts.nota')->render());

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

    public function history()
    {
      $history = History::all();
      return view('post.history');
    }
}
