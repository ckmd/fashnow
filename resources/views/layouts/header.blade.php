<div class="container">
<div id="welcomeLine" class="row">
	@guest
		<div class="span6">Silahkan Login </div>
	@else
		<div class="span6">Hai !<strong> {{Auth::user()->name}} </strong></div>

	<div align="right"><a href="{{ route('logout') }}"
	onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
	 class="dropdown-toggle" data-toggle="dropdown" role="button"><span>Log out</span></a>

	 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

	 </div>
	 @endguest
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
  	<!--logo-->
    <a class="brand" href="{{ url('/')}}"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="GET" action="/category" >
		{{ csrf_field() }}
		<input id="srchFld" class="srchTxt" type="text" />

          <select class="srchTxt" name="category">
			<option value="Atasan Wanita">Atasan Wanita </option>
			<option value="Bawahan Wanita">Bawahan Wanita </option>
			<option value="Aksesoris Wanita">Aksesoris Wanita </option>
			<option value="Atasan Pria">Atasan Pria </option>
			<option value="Bawahan Pria">Bawahan Pria </option>
			<option value="Aksesoris Pria">Aksesoris Pria </option>
		</select>
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class="">
	 <a href="/product_summary"><span class="btn btn-large btn-primary"><i class="icon-shopping-cart icon-white"></i> Keranjang</span> </a>
	 @guest
	 <li class="">
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Masuk</span></a></li>
	 <li class="">
	 <a href="#signup" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Daftar</span></a>
	@include('auth.masuk')
	@include('auth.signup')
	@else
		<li class="">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><span class="btn btn-large btn-warning">{{ Auth::user()->name }}</span></a></li>
		</li>
	@endguest
	</li>
    </ul>
  </div>
</div>
</div>
	@if(\Request::is('succeess'))
	@else
<div id="sidebar" class="span3">
		@guest
			<div class="well well-small"><img src="/themes/images/ico-cart.png" alt="cart"> 0 Items in your cart  <a id="myCart" href="/product_summary"> <span class="badge badge-warning pull-right">SHOW</span></a></div>
		@else
		<div class="well well-small"><img src="/themes/images/ico-cart.png" alt="cart"> {{ count(Auth::user()->carts) }} Items in your cart <a id="myCart" href="/product_summary"> <span class="badge badge-warning pull-right">SHOW</span></a></div>
		@endguest
	@endif
</div>
</div>
