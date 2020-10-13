@extends('layouts.app')
@section('styles_')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('jsfiles_')
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="{{ url('js/dataTables.js') }}" ></script>
@endsection
@section('title','Mercados')
@section('description','Listado de Mercados')
@section('font','shopping-car')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-body table-responsive">
			<table class="table table-hover table-bordered dataTable no-footer" data-url="markets/get_markets" id="markets_table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
@can('create', App\Models\Market::class)
<div class="floating">
	<a href="{{url('/admin/markets/create')}}" class="btn btn-primary btn-fab in" title="Crear un nuevo Mercado">
		<i class="material-icons">add</i>
	</a>
</div>
@endcan
@endsection