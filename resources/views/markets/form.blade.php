<div class="tab-pane container">
	<div class="card user-settings">
		<div class="card-body">
			
			<h4 class="line-head"></h4>
			<form action="{{$url}}" method="{{$method}}" class="form-horizontal">
				@csrf
	            <div class="form-group">
					<label class="control-label">Nombre</label>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $market->name) }}" required autocomplete="name" placeholder="Nombre" autofocus>

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group">
					<label class="control-label">Dirección</label>
					<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $market->address) }}" required autocomplete="address" placeholder="Dirección" autofocus>

					@error('address')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group">
					<label class="control-label">Descripción</label>
					<textarea class=" @error('description') is-invalid @enderror form-control" id="textarea" name="description"  placeholder="Descripción de la religión" > {{ old('description',$market->description) }} </textarea>
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