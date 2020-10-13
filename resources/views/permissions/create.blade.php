@extends("layouts.app")

@section('title', 'Crear Permiso')
@section('description', 'Este es el formulario para crear una nuevo Permiso')
@section('font','list')
@section("content")
<div class="container">
	@include('permissions.form', ['url' => url('/admin/permissions/create'), 'method' => 'POST'])
</div>
@endsection