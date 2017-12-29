<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class HomeController extends Controller
{
    public function index(){
      $items = Inventory::all();
      return view('home', ['items'=>$items]);
    }
    public function show($id){
      $item = Inventory::find($id);
      //dd($item);
      return view('home', ['item'=>$item]);
    }
}
