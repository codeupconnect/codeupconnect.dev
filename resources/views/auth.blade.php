@extends('master')

@section('content')

	@foreach ($userData as $data)
		{{ $data }}
	@endforeach

@stop