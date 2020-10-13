@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-6 col-lg-3">
			<div class="widget-small primary coloured-icon"><i class="icon fas fa-user fa-3x"></i>
				<div class="info">
					<h4>Usuarios</h4>
					<p><b>{{count($users)}}</b></p>
				</div>
			</div>
		</div>
	</div>
@endsection