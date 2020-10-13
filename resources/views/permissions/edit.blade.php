@extends("layouts.app")

@section('title', 'Editar Permiso')
@section('description', 'Este es el formulario para editar un Permiso')
@section('font','list')
@section("content")
<div class="container-white">
	@include('permissions.form', ['url' => url('/admin/permissions/edit/'.$permission->id), 'method' => 'POST'])
</div>
@endsection