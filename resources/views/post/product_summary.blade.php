@extends('layouts.master')


@section('content')
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> Keranjang</li>
    </ul>
	<h3>  Keranjang </h3>
	<hr class="soft"/>

	@guest
	<table class="table table-bordered">
		<tr><th> I AM ALREADY REGISTERED  </th></tr>
		 <tr>
		 <td>
			<form class="form-horizontal" id="loginForm2">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Email</label>
				  <div class="controls">
					<input type="text" id="inputUsername" placeholder="Username" name="email">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" placeholder="Password" name="password">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button role="button"  class="btn loginUser">Sign in</button> OR 
					<a href="#signup" role="button" data-toggle="modal" style="padding-right:0"><span class="btn">Daftar Sekarang</span></a>
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
    <div class="alert alert-danger" id="errorjsLogin2">
    </div>
</div>
	@else
		@include('layouts.cart')
	@endguest

	<a href="{{ url('/products') }}" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="{{ url('/confirmation')}}" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>

</div>
</div></div>
</div>
<!-- MainBody End ============================= -->


@endsection
