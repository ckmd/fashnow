@extends('layouts.master')

@section('content')
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li><a href="products.html">Barang</a> <span class="divider">/</span></li>
    <li class="active">{{$product->category}}</li>
    </ul>
	<div class="row">
			<div id="gallery" class="span3">
            <a href="{{url('/storage/'.$product->image)}}" title="Fujifilm FinePix S2950 Digital Camera">
				<img src="{{url('/storage/'.$product->image)}}" style="width:100%" alt="{{$product->name}}"/>
            </a>
			</div>
			<div class="span6">
				<h3>{{$product->name}}</h3>
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm" action="">
					{{ csrf_field() }}
				  <div class="control-group">
					<label class="control-label"><span>Rp {{$product->price}}</span></label>
					<div class="controls">
					<input type="number" class="span1" placeholder="Qty." name="quantity"/>
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Tambahkan ke Keranjang <i class=" icon-shopping-cart"></i></button>
					</div>
				  </div>
				</form>

				<hr class="soft"/>
				<h4>{{$product->stock}} item dalam stock</h4>
				<hr class="soft clr"/>
				<p>{{$product->detail}}</p>
			</div>
    </div>
	</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
@endsection
