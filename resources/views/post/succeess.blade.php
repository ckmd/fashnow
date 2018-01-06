@extends('layouts.master')
@section('content')
  <table align="center">
    <tr>
      <td align="center">
        <img width="250" height="250" src="themes/images/succeess.png" title="sukses" alt="sukses"/>
      </td>
    </tr>
    <tr align="center">
      <td>
        <h1>Transaksi sukses</h1>
      </td>
    </tr>
    <tr >
      <td colspan="2"><a href="/" class="btn btn-large btn-danger pull-left">Belanja Lagi</a> 
      <a href="/printNota" class="btn btn-large btn-warning pull-right">Cetak Nota</a></td>
    </tr>
  </table>
@endsection
