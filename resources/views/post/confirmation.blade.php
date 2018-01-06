@extends('layouts.master')
@section('content')
	<div class="span9">
    <h3>Konfirmasi belanjaan anda</h3>
	@guest
		@include('layouts.error')
	@else
		@include('layouts.nota')
	@endguest

	<div class="form-group">

	<form method="post" action={{ url('/succeess')}}>
		{{ csrf_field() }}
		<a href="{{ url('/products') }}" class="btn btn-large btn-danger"><i class="icon-arrow-left"></i> Lanjutkan Belanja </a>
		<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
		<button type="submit" name="submit" class="btn btn-large pull-right btn-primary">Bayar dan Lihat Nota <i class="icon-arrow-right"></i></a>
	</form>
	</div>
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->


@endsection
