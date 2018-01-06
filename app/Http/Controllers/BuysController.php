<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuysController extends Controller
{
    public function showKeranjang(){
        return view('post.product_summary');
      }
    public function confirmation(){
      return view('post.confirmation');
    }
}
