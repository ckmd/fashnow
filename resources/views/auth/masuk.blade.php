<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" align="center">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>FASHNOW</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" method="POST" action="{{ route('login') }}">

            {{ csrf_field() }}

			  <div class="control-group">
			  	<table>
			  		<tr>
			  			<td>
							<input type="text" id="inputEmail" placeholder="Email" name="email" value="{{ old('email') }}">			  				
			  			</td>
			  		</tr><tr>
			  			<td>&nbsp</td>
			  		</tr>
			  		<tr>
			  			<td>
							<input type="password" id="inputPassword" placeholder="Password" name="password" value="{{ old('password') }}">			  				
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