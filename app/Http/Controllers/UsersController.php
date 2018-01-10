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

  public function update(User $user)
  {
    $user->name = request('name');
    $user->email = request('email');
    $user->password = request('password');
    $user->address = request('address');
    $user->phone = request('phone');
    $user->save();

    // dd($user);

    return back();
  }

  public function updatePage(User $user)
  {
    return view('post.edit_profil',compact($user));
  }
}
