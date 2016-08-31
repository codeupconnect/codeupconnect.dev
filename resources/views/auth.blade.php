@extends('master')

@section('content')

	@foreach ($_SESSION as $data)
		{{ $data }}
	@endforeach

@stop