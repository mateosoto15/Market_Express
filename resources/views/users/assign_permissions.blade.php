@extends('layouts.app')
@section('styles_')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('jsfiles_')
	<script src="{{ url('js/delete.js') }}"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="{{ url('js/dataTables.js') }}" ></script>
@endsection
@section('title','Asignar permisos')
@section('description','En esta vista se podrán asignar permisos a los usuarios')
@section('font','user')
@section('content')
<div class="container">
	<form action="{{url('admin/users/' . $user->id . '/assignPermissions')}}" method="POST" class="form-horizontal">
		@csrf
		<div class="card">
			<div class="card-body table-responsive">
				<table class="table table-hover table-bordered dataTable no-footer"  id="assign_permissions">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($permissions as $permission)
							<tr class="{{ $user->hasPermission($permission->name) ? 'bg-success' : 'bg-warning' }}">
								<td>{{ $permission->name }}</td>
								<td>{{ $permission->description }}</td>
								<td>
									@if($user->hasPermission($permission->name))
										<a href="#" data-url="/admin/users/{{ $permission->id }}/dettach/{{ $user->id }}" class="btn btn-outline-danger" onclick="Delete($(this));" > Revocar </a>
									@else
										<input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-control">
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="form-group row mb-12">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary float-right"><i class="fa fa-fw fa-lg fa-check-circle "></i>
					Save
				</button>
			</div>
		</div>
	</form>
</div>

@endsection