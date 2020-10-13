@extends('layouts.app')
@section('styles_')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('jsfiles_')
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="{{ url('js/dataTables.js') }}" ></script>
@endsection
@section('title','Usuarios')
@section('description','Listado de Usuarios')
@section('font','user')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-body table-responsive">
			<table class="table table-hover table-bordered dataTable no-footer" data-url="users/get_all_users" id="users_table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Email</th>
						<th>Role</th>
						<th>Acciones</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
@endsection