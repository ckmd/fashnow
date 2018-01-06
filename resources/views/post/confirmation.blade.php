@extends('layouts.master')
@section('content')
	<div class="span9">
    <h3>Konfirmasi belanjaan anda</h3>
	@guest
		@include('layouts.error')
	@else
		@include('layouts.nota')
	@endguest

	<a href="{{ url('/products') }}" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="{{ url('/succeess')}}" class="btn btn-large pull-right">Bayar<i class="icon-arrow-right"></i></a>

</div>
</div></div>
</div>
<!-- MainBody End ============================= -->


@endsection
