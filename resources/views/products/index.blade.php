@extends('layouts.app')
@section('styles_')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('jsfiles_')
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="{{ url('js/dataTables.js') }}" ></script>
@endsection
@section('title','Productos')
@section('description','Listado de Productos')
@section('font','boxes')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-body table-responsive">
			<table class="table table-hover table-bordered dataTable no-footer" data-url="products/get_products" id="products_table">
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
@can('create', App\Models\Product::class)
	<div class="floating">
		<a href="{{url('/admin/products/create')}}" class="btn btn-primary btn-fab in in in" title="Agregar un producto">
			<i class="material-icons">add</i>
		</a>
	</div>
@endcan
@endsection