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
<form method="POST" action="/users/edit/{{Auth::user()->id}}">
{{ csrf_field() }}
{{method_field('PATCH')}}
<div align="center">
  <table>
    <tr align="center">
      <td colspan="2"><h3>Edit profil</h3></td>
    </tr>
    <tr>
      <td colspan="2"><img src="{{url('/storage/'.Auth::user()->avatar)}}" style="width:100%" alt="{{Auth::user()->name}}"/></td>
    </tr>
    <tr>
      <td>User name</td>
      <td><input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" required></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" required></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="text" class="form-control" id="password" name="password"  required></td>
    </tr>
    <tr>
      <td>address</td>
      <td><input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->address}}" required></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><input type="text" class="form-control" id="title" name="title" value="{{Auth::user()->phone}}" required></td>
    </tr>
    <tr align="center">
    <td colspan="1"><a href="/profil" class="btn btn-large btn-warning">Back</a></td>
      <td colspan="1"><button type="submit" name="submit>"<a class="btn btn-large btn-primary">Edit</a></button></td>

    </tr>
  </table>
</div>

<div class="form-group">
    <div class="alert alert-danger" id="errorsjs">
      <ul>
          @foreach ($errors as $error)
          <li>
              {{$error}}
          </li>
          @endforeach
      </ul>
    </div>
</div>
  
</form>
@endguest
@endsection
