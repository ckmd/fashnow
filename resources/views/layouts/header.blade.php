<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Hai !<strong> Aulia</strong></div>
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
		<form class="form-inline navbar-search" method="post" action="products.html" >
		<input id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt">
			<option>Atasan Wanita </option>
			<option>Bawahan Wanita </option>
			<option>Aksesoris Wanita </option>
			<option>Atasan Pria </option>
			<option>Bawahan Pria </option>
			<option>Aksesoris Pria </option>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class="">
	 <a href="{{ url('/product_summary')}}"><span class="btn btn-large btn-primary"><i class="icon-shopping-cart icon-white"></i> Keranjang</span> </a>
	 <li class="">
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Masuk</span></a></li>
	 <li class="">
	 <a href="#signup" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Daftar</span></a>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" align="center">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>FASHNOW</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm">
			  <div class="control-group">
			  	<table>
			  		<tr>
			  			<td>
							<input type="text" id="inputEmail" placeholder="Email">			  				
			  			</td>
			  		</tr><tr>
			  			<td>&nbsp</td>
			  		</tr>
			  		<tr>
			  			<td>
							<input type="password" id="inputPassword" placeholder="Password">			  				
			  			</td>
			  		</tr>
			  		<tr>
			  		<tr>
			  			<td>&nbsp</td>
			  		</tr>
			  		</tr>
			  		<tr>
			  			<td>
							<button type="submit" class="btn btn-success" >Masuk</button>			  				
			  			</td>
			  		</tr>
			  	</table>
			  </div>
			</form>		
		  </div>
	</div>
	<div id="signup" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="false" align="center" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Mendaftarkan Account</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm">
			  <div class="control-group">
			  	<table>
			  		<tr>
			  			<td>
			  				Nama			
			  			</td>
			  			<td>
			  				<input type="text" id="inputNama" placeholder="Nama">
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
							Email
			  			</td>
			  			<td>
							<input type="text" id="inputEmail" placeholder="Email">
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				Telepon  				
			  			</td>
			  			<td>
							<input type="text" id="inputTelepon" placeholder="Telepon">			  				
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
						  	Password	  				
			  			</td>
			  			<td>
						  	<input type="password" id="inputPassword" placeholder="Password">			
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				Konfirmasi Password
			  			</td>
			  			<td>
							<input type="password" id="inputPassword" placeholder="Konfirmasi Password">  				
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>&nbsp</td>
			  		</tr>
			  		<tr>
			  			<td>
			  			</td>
			  			<td>
							<button type="submit" class="btn btn-success">Daftar</button>			  				
			  			</td>
			  		</tr>
			  	</table>
			</div>
			</form>		
		  </div>
	</div>
	</li>
    </ul>
  </div>
</div>
</div>