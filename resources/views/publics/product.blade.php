@extends('layouts.guest')
@section('styles_')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('jsfiles_')
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="{{ url('js/dataTables.js') }}" ></script>
@endsection
@section('content')
	<div class="con">
		<div class="row">
			<div class="col-md-3">
				<h2>Buscar</h2>
				<form action="{{ url('/search/product') }}">
					<input type="text" name="product_name" class="form-control">
					<button type="submit" class="btn btn-info mt-1 text-white">Buscar</button>
				</form>
			</div>
			<div class="col-md-9">
				<h4>Productos: @foreach($products as $product) {{ $product['product']->name }} @if(!$loop->last) , @endif @endforeach </h4>
				<table class="table table-hover table-bordered dataTable no-footer"  id="table">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Mercado</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
							<tr>
								<td>{{ $product['product']->name }}</td>
								<td>{{ $product['product']->description }}</td>
								<td>{{ $product['market']->name }}</td>
								<td>{{ $product['price'] }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection