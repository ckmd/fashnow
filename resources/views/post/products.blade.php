@extends('layouts.master')

@section('content')

<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="/">Home</a> <span class="divider">/</span></li>
		@if (request('search') != '' )
		<li class="active">{{ request('search') }}</li>
		@else
		<li class="active">{{ request('category') }}</li>
		@endif
		</ul>
		@if (request('search') != '' )
	<h3> Hasil pencarian untuk {{ request('search') }} <small class="pull-right"> {{count($products)}} products are available </small></h3>	
	@else
	<h3> {{ request('category') }} <small class="pull-right"> {{count($products)}} products are available </small></h3>	
	@endif
	<hr class="soft"/>
	<p>
		Fashnow merupakan sebuah Toko Fashion online yang memiliki Cabang dimana mana dan selurh harga di toko ini. Semuanya terjangkau
		Selalu kunjungi fashnow tiap harinya. Karena akan selalu diupdate.
	</p>
	<hr class="soft"/>
	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Sort By </label>
			<select>
              <option>Priduct name A - Z</option>
              <option>Priduct name Z - A</option>
              <option>Priduct Stoke</option>
              <option>Price Lowest first</option>
            </select>
		</div>
	  </form>

<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane active" id="listView">
		<div class="row">
			<script>
			</script>
		@foreach($products as $product)
			<div class="span2">
				<img src="{{url('/storage/'.$product->image)}}" alt=""/>
			</div>
			<div class="span4">
			@if ($product->stock != 0 )
					<h3><span class="btn btn-success">Tersedia</span></h5>
				@else
					<h5><span class="btn btn-danger">Stock Habis</span></h5>
			@endif
				<hr class="soft"/>
				<h5><a href="/products/{{$product->id}}"> {{$product->name }}</a></h5>
				<p>
					{{ $product->detai}}
				</p>
				<a class="btn btn-small pull-right" href="/products/{{$product->id}}">View Details</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> Rp {{ $product->price }} </h3>
			<label class="checkbox">
				<input type="checkbox">  Adds product to compair
			</label><br/>

			  <a href="/products/{{$product->id}}" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
			  <a href="/products/{{$product->id}}" class="btn btn-large"><i class="icon-zoom-in"></i></a>

				</form>
			</div>
			@endforeach
			
		</div>
		
		<hr class="soft"/>
	</div>

	<div class="tab-pane" id="blockView">
		<ul class="thumbnails">
			<script>
				var products_length = {{count($products)}}
			</script>
			@for ($i =0 ; $i<count($products) ; $i++ )
			@php($product = $products[$i])
			<li class="span3">
			  <div class="thumbnail product-id" id="product_id{{$i}}" name="{{$product->id}}">
				<a href="/products/{{$product->id}}"><img src="{{url('/storage/'.$product->image)}}" alt=""/></a>
				<div class="caption">
				  <a href="/products/{{$product->id}}"><h5>{{ $product->name }}</h5></a>
				  <p> 
					{{ $product->detail}} 
				  </p>
				   <h4 style="text-align:center">
						 <a class="btn" href="">
						 <i class="icon-zoom-in"></i></a> 
						 <a class="btn tambah-keranjang{{$i}}" href="#">Add to
								<i class="icon-shopping-cart"></i></a><br>
								<a class="btn btn-primary" href="#">{{$product->price}}</a>
					</h4>
				</div>
			  </div>
			</li>
			@endfor
		  </ul>
	<hr class="soft"/>
	</div>
</div>

	
</div>
</div>
</div>
<!-- MainBody End ============================= -->

@endsection
