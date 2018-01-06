<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;

class BuysController extends Controller
{
    public function showKeranjang(){
        return view('post.product_summary');
      }

    public function confirmation(){
      return view('post.confirmation');
    }

    public function printNota(){
      File::put('nota.html',view('layouts.nota')->render());

      return redirect('/dompdf.php');
    }

    public function prosesTransaksi()
    {
      $user = User::find(request('user_id'));
      $user->carts()->delete();

      return view('post.succeess');
    }
}
