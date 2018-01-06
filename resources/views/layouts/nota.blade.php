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
              @php($totalTax = 0)
              @php($totalPrice = 0)
              @php($totalPriceTax = 0)
              @foreach( Auth::user()->carts as $cart )
              @php( $inventory = $cart->inventory )
                  <tr>
                    <td> <img width="60" src="{{url('/storage/'.$inventory->image)}}" alt=""/></td>
                    <td>{{ $inventory->name }}</td>
                    <td>{{ $cart->quantity }}
                    </td>
                    <td>Rp {{ $inventory->price*$cart->quantity }}</td>
                    <td>RP {{ $inventory->price*$cart->quantity*10/100}}</td>
                    <td>Rp {{ $inventory->price*$cart->quantity + $cart->inventory->price*$cart->quantity*10/100 }}</td>
                  </tr>
                  @php($totalPrice += $inventory->price*$cart->quantity)
                  @php($totalTax += $inventory->price*$cart->quantity*10/100)
                  @php($totalPriceTax += $inventory->price*$cart->quantity + $cart->inventory->price*$cart->quantity*10/100)
              @endforeach

                 <tr>
                  <td colspan="5" style="text-align:right">Total Harga </td>
                  <td> {{$totalPrice}}</td>
                </tr>
                <tr>
                 <td colspan="5" style="text-align:right">Total Tax </td>
                 <td> {{$totalTax}}</td>
               </tr>
				        <tr>
                  <td colspan="5" style="text-align:right"><strong>TOTAL BAYAR</strong></td>
                  <td class="label label-important" style="display:block"> <strong>Rp {{ $totalPriceTax }} </strong></td>
                </tr>
				</tbody>
            </table>
