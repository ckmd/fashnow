@extends('layouts.master')

@section('content')
@guest
<table class="table table-bordered">
  <tr><th> I AM ALREADY REGISTERED  </th></tr>
   <tr>
   <td>
    <form class="form-horizontal">
      <div class="control-group">
        <label class="control-label" for="inputUsername">Username</label>
        <div class="controls">
        <input type="text" id="inputUsername" placeholder="Username">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword1">Password</label>
        <div class="controls">
        <input type="password" id="inputPassword1" placeholder="Password">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
        <button type="submit" class="btn">Sign in</button> OR <a href="register.html" class="btn">Register Now!</a>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <a href="forgetpass.html" style="text-decoration:underline">Forgot password ?</a>
        </div>
      </div>
    </form>
    </td>
    </tr>
</table>

<div class="form-group">
  <div class="alert alert-danger">
      <ul>
          <li>Silahkan Login Terlebih Dahulu</li>
      </ul>
  </div>
</div>
@else
<div align="center">
  <table>
    <tr align="center">
      <td colspan="2"><h3>profil anda</h3></td>
    </tr>
    <tr>
      <td colspan="2"><img src="{{url('/storage/'.Auth::user()->avatar)}}" style="width:100%" alt="{{Auth::user()->name}}"/></td>
    </tr>
    <tr>
      <td>user id</td>
      <td>{{Auth::user()->id}}</td>
    </tr>
    <tr>
      <td>user name</td>
      <td>{{Auth::user()->name}}</td>
    </tr>
    <tr>
      <td>email</td>
      <td>{{Auth::user()->email}}</td>
    </tr>
    <tr>
      <td>password</td>
      <td>********</td>
    </tr>
    <tr>
      <td>address</td>
      <td>{{Auth::user()->address}}</td>
    </tr>
    <tr>
      <td>phone</td>
      <td>{{Auth::user()->phone}}</td>
    </tr>
    <tr align="center">
      <td><a href="/edit" class="btn btn-large btn-warning">Edit profil</a></td>
      <td><a href="/history" class="btn btn-large btn-success">History belanja</a></td>
    </tr>
  </table>
</div>
@endguest
@endsection
