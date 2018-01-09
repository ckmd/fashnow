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
$item1 = 0;
$item2 = 0;
$item3 = 0;
$item4 = 0;
$item5 = 0;
$item6 = 0;
?>
@foreach( Auth::user()->histories as $history )
    <tr>
      <th align="center" scope="row">{{ $history->id_history }}</th>
      <td>{{ $history->cart_id }}</td>
      <td>{{$history->inventory_id}}</td>
      <td align="center">{{ $history->quantity }}</td>
      <td>{{$history->created_at}}</td>
    </tr>
<?php
  switch ($history->inventory_id) {
    case '1':
      $item1++;
      break;
    case '2':
      $item2++;
      break;
    case '3':
      $item3++;
      break;
    case '4':
      $item4++;
      break;
    case '5':
      $item5++;
      break;
    case '6':
      $item6++;
      break;
    default:
      break;
  }
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
        ['Opening Move', 'Percentage'],
        ["item 1", {{$item1}}],
        ["item 2", {{$item2}}],
        ["item 3", {{$item3}}],
        ["item 4", {{$item4}}],
        ["item 5", {{$item5}}],
        ["item 6", {{$item6}}]
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
