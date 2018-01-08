<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
  public function index(){
    $profil = User::all();
    return view('post.profil',['profil'=>$profil]);
  }
}
