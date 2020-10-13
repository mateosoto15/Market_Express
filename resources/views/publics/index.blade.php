@extends('layouts.guest')
@section('styles_')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection
@section('jsfiles_')
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="{{ url('js/dataTables.js') }}" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
	<script src="{{ url('js/select2.js') }}" ></script>
@endsection
@section('content')
	<div class="con">
		<div class="row">
			<div class="col-md-3">
				<h2>Buscar</h2>
				<form action="{{ url('/search/product') }}">
					<div class="form-group">
						<label class="control-label">Productos</label>
						<select class="form-control products" required name="products[]" multiple="multiple" placeholder="Seleccionar varios" data-url="/admin/products/get_products_select"></select>
					</div>
					<button type="submit" class="btn btn-info mt-1 text-white">Buscar</button>
				</form>
			</div>
			<div class="col-md-9">
				<table class="table table-hover table-bordered dataTable no-footer" data-url="admin/markets/get_markets" id="markets_table_without_actions">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Dirección</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
@endsection