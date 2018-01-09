<div id="signup" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="false" align="center" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Mendaftarkan Account</h3>
		  </div>
		  <div id="registerForm">
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" method="POST" action="{{ route('register') }} ">
			  {{ csrf_field() }}

              <div class="control-group">
			  	<table>
			  		<tr>
			  			<td>
			  				Nama			
			  			</td>
			  			<td>
			  				<input class="form-control" type="text" id="inputNama" name="name" placeholder="Nama" required>
							  @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
							Email
			  			</td>
			  			<td>
							<input class="form-control" type="text" id="inputEmail" placeholder="Email" name="email" required>
							@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
			  			</td>
					  </tr>
					  <tr>
			  			<td>
							Address
			  			</td>
			  			<td>
							<input class="form-control" type="text" id="inputAddress" placeholder="Address" name="address" required>
							@if ($errors->has('address'))
							<span class="help-block">
								<strong>{{ $errors->first('address') }}</strong>
							</span>
						@endif
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				Telepon  				
			  			</td>
			  			<td>
							<input type="text" id="inputTelepon" placeholder="Telepon" name="phone" class="form-control" required>			  				
							@if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
						  	Password	  				
			  			</td>
			  			<td>
						  	<input type="password" id="inputPassword" placeholder="Password" name="password" class="form-control" required>			
							  @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>
			  				Konfirmasi Password
			  			</td>
			  			<td>
							<input type="password" id="password-confirm" placeholder="Konfirmasi Password" name="password_confirmation" class="form-control" required>  				
			  			</td>
			  		</tr>
			  		<tr>
			  			<td>&nbsp</td>
			  		</tr>
			  		<tr>
			  			<td>
			  			</td>
			  			<td>
							<button type="submit" class="btn btn-success" id="registerUser">Daftar</button>			  				
			  			</td>
			  		</tr>
			  	</table>
			</div>
			</form>		
			@include ('layouts.errorjs')
		  </div>
		  </div>
	</div>