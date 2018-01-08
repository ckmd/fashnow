  <center><img src="themes/images/logofashnow.png" height="100" width="400" /></center>
<table class="table table-bordered" border="1" align="center">
              <thead align="center">
                <tr>
                  <th scope="col">Product id</th>
                  <th scope="col">Description</th>
                  <th scope="col">Quantity</th>
				          <th scope="col">Price</th>
                  <th scope="col">Tax</th>
                  <th scope="col">Total</th>
				        </tr>
              </thead>
              <tbody>
              @php($totalTax = 0)
              @php($totalPrice = 0)
              @php($totalPriceTax = 0)
              @foreach( Auth::user()->carts as $cart )
              @php( $inventory = $cart->inventory )
                  <tr>
                    <th align="center" scope="row">{{ $inventory->id }}</th>
                    <td>{{ $inventory->name }}</td>
                    <td align="center">{{ $cart->quantity }}</td>
                    <td> Rp {{ $inventory->price*$cart->quantity }}</td>
                    <td> Rp {{ $inventory->price*$cart->quantity*10/100}}</td>
                    <td> Rp {{ $inventory->price*$cart->quantity + $cart->inventory->price*$cart->quantity*10/100 }}</td>
                  </tr>
                  @php($totalPrice += $inventory->price*$cart->quantity)
                  @php($totalTax += $inventory->price*$cart->quantity*10/100)
                  @php($totalPriceTax += $inventory->price*$cart->quantity + $cart->inventory->price*$cart->quantity*10/100)
              @endforeach
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
                 <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                  <td>Total Harga </td>
                  <td> Rp {{$totalPrice}}</td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                 <td>Total Tax </td>
                 <td> Rp {{$totalTax}}</td>
               </tr>
				        <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><b>TOTAL BAYAR</b></td>
                  <td><b> Rp {{ $totalPriceTax }} </b></td>
                </tr>
				</tbody>
    </table>
    <div align="center">
      <h2>Fashnow</h2>
      <h3>Toko online terpercaya</h3>
      <h4>dicetak pada {{ date('Y-m-d H:i:s') }} waktu server</h3>
        <h4>Terima kasih atas pembelian anda<br>kami tunggu pembelian berikutnya</h4>
    </div>
