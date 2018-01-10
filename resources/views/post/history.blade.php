@extends('layouts.master')
@section('content')
<table>
  <tr>
    <th>id</th>
    <th>cart_id</th>
    <th>inventory_id</th>
    <th>quantity</th>
    <th>dibuat_pada</th>
  </tr>
<?php
$items = array();
?>
@foreach( Auth::user()->histories as $i=>$history )
    <tr>
      <th align="center" scope="row">{{ $history->id_history }}</th>
      <td>{{ $history->cart_id }}</td>
      <td>{{$history->inventory->name}}</td>
      <td align="center">{{ $history->quantity }}</td>
      <td>{{$history->created_at}}</td>
    </tr>
<?php
if (empty($items[$history->inventory->name])){
  $items[$history->inventory->name] = 0;
}

$items[$history->inventory->name]++;

?>
@endforeach
</table>
<div>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
      var data = new google.visualization.arrayToDataTable([
        ['Nama Item', 'jumlah beli'],

        @foreach($items as $key=>$value)
        ['{{$key}}',{{$value}}],
        @endforeach

      ]);

      var options = {
        title: 'Chess opening moves',
        width: 900,
        legend: { position: 'none' },
        bars: 'horizontal', // Required for Material Bar Charts.
        axes: {
          x: {
            0: { side: 'top', label: 'Statistik belanjaan anda'} // Top x-axis.
          }
        },
        bar: { groupWidth: "90%" }
      };

      var chart = new google.charts.Bar(document.getElementById('top_x_div'));
      chart.draw(data, options);
    };
  </script>
</div>
<div>
  <div id="top_x_div" style="width: 900px; height: 500px;"></div>
</div>

@endsection
