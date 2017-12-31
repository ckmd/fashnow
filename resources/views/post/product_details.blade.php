@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li><a href="products.html">Barang</a> <span class="divider">/</span></li>
    <li class="active">Detail Barang</li>
    </ul>	
	<div class="row">	  
			<div id="gallery" class="span3">
            <a href="themes/images/products/large/f1.jpg" title="Fujifilm FinePix S2950 Digital Camera">
				<img src="themes/images/products/large/3.jpg" style="width:100%" alt="Kemeja Batik Pria Terbaru"/>
            </a>
			</div>
			<div class="span6">
				<h3>Kemeja Batik Pria Terbaru </h3>
				<small>Batik asli buatan Indonesia</small>
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span>Rp 222.000</span></label>
					<div class="controls">
					<input type="number" class="span1" placeholder="Qty."/>
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Tambahkan ke Keranjang <i class=" icon-shopping-cart"></i></button>
					</div>
				  </div>
				</form>
				
				<hr class="soft"/>
				<h4>100 item dalam stock</h4>
				<hr class="soft clr"/>
				<p>
				Datanya ada di flashdisk wkwkw				
				</p>
			</div>
          </div>

	</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->

@endsection