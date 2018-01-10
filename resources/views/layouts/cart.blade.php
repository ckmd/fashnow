<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity</th>
				  <th>Price</th>
                  <th>Tax</th>
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
                <script>
                  cart_count = {{ count(Auth::user()->carts) }}
                </script>
                <div id="container-keranjang">
              @php($totalTax = 0)
                  @php($totalPrice = 0)
              @foreach( Auth::user()->carts as $i=>$cart )
              @php( $inventory = $cart->inventory )
                  <tr>
                    <td> <img width="60" src="{{url('/storage/'.$inventory->image)}}" alt=""/></td>
                    <td><strong><a href="/products/{{ $inventory->id }}" >{{ $inventory->name }}</a></strong><br/>{{ $inventory->detail }}</td>
                    <td>
                    <div class="input-append">
                      <input class="span1" style="max-width:34px" placeholder="{{ $cart->quantity }}" value="{{ $cart->quantity }}" id="appendedInputButtons" name="qty" size="16" type="text">
                      <input type="hidden" name="cart-id" value="{{$cart->id}}">

                  <button class="btn btn-danger" type="button" id="del-item{{$i}}"><i class="icon-remove icon-white"></i></button>				</div>
                    </td>
                    <td>Rp {{ $inventory->price*$cart->quantity }}</td>
                    <td>RP {{ $inventory->price*$cart->quantity*10/100}}</td>
                    <td>Rp {{ $inventory->price*$cart->quantity + $cart->inventory->price*$cart->quantity*10/100 }}</td>
                  </tr>

                  @php($totalTax += $inventory->price*$cart->quantity*10/100)
                  @php($totalPrice += $inventory->price*$cart->quantity + $cart->inventory->price*$cart->quantity*10/100)
              @endforeach
              </div>

				 <tr>
                </tr>
                 <tr>
                  <td colspan="5" style="text-align:right">Total Tax:	</td>
                  <td> {{$totalTax}}</td>
                </tr>
				 <tr>
                  <td colspan="5" style="text-align:right"><strong>TOTAL = </strong></td>
                  <td class="label label-important" style="display:block"> <strong>Rp {{ $totalPrice }} </strong></td>
                </tr>
				</tbody>
            </table>
