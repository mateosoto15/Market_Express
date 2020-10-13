@extends("layouts.app")

@section('styles_')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection
@section('jsfiles_')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
	<script src="{{ url('js/select2.js') }}" ></script>
@endsection

@section('title', 'Editar Usuario')
@section('description', 'Este es el formulario para editar un nuevo Usuario')
@section('font','clipboard-list')
@section("content")
<div class="container">
	@include('register.form', ['url' => url('/admin/users/edit/' . $user->id), 'method' => 'POST'])
</div>
@endsection