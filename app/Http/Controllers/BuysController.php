<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
}
