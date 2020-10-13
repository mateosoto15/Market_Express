<div class="tab-pane container">
	<div class="card user-settings">
		<div class="card-body">
			
			<h4 class="line-head"></h4>
			<form action="{{$url}}" method="{{$method}}" class="form-horizontal" enctype="multipart/form-data">
				@csrf
	            <div class="form-group">
					<label class="control-label">Nombre</label>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $permission->name }}" required autocomplete="name" placeholder="Nombre" autofocus>

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group">
					<label class="control-label">Descripción</label>
					<textarea class=" @error('description') is-invalid @enderror form-control" id="textarea" name="description" required placeholder="Descripción del permiso" > {{ $permission->description }} </textarea>
					@error('description')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group row mb-12">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>
							Save
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>