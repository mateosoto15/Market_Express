@extends("layouts.app")
@section('styles_')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection
@section('jsfiles_')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
	<script src="{{ url('js/select2.js') }}" ></script>
@endsection
@section('title', 'Editar Mercado')
@section('description', 'Este es el formulario para editar un Mercado')
@section('font','users')
@section("content")
<div class="container-white">
	@include('markets.form', ['url' => url('/admin/markets/edit/'.$market->id), 'method' => 'POST'])
</div>
@endsection