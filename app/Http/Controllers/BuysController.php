<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
      $user->carts()->delete();
      
      return back();
    }
}
