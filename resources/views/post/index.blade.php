@extends ('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="span9">
			<div class="well well-small">
			<h4>Paling Sering Dibeli </h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
				@for($i = 0; $i< count($products) ; $i++)
				@php($product = $products[$i])
					@if($i % 4 == 0)
						@if($i==0)
			  			<div class="item active">
						@else
							<div class="item">
						@endif
			  		<ul class="thumbnails">
					@endif
					<li class="span3">
						<div class="thumbnail">
							<i class="tag"></i>
							<a href="product_details.html"><img src="{{url('/storage/'.$product->image)}}" alt=""></a>
							<div class="caption">
								<h5>{{$product->name}}</h5>
								<h4><a class="btn" href="products/{{$product->id}}">VIEW</a> <span class="pull-right">Rp {{$product->price}}</span></h4>
							</div>
						</div>
					</li>
					@if((($i+1) %4 == 0 && $i!=0) || $i == count($products) - 1)
					</ul>
					</div>
					@endif
						@endfor
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>
		<h4>Produk Terbaru </h4>
			  <ul class="thumbnails">
					@for ($i=count($products) - 1;$i=count($products) - 4;$i--)
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.html"><img src="themes/images/products/9.jpg" alt=""/></a>
					<div class="caption">
					  <h5>Product name</h5>
					  <p>
						Lorem Ipsum is simply dummy text.
					  </p>
					  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
					</div>
				  </div>
				</li>
					@endfor
			  </ul>
		</div>
		</div>
	</div>
@endsection
