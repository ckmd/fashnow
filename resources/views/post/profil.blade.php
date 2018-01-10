@extends('layouts.master')

@section('content')
@guest

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
      <td><a href="/users/edit/{{Auth::user()->id}}" class="btn btn-large btn-warning">Edit profil</a></td>
      <td><a href="/history" class="btn btn-large btn-success">History belanja</a></td>
    </tr>
  </table>
</div>
@endguest
@endsection
