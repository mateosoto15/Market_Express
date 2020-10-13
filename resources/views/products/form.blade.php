<div class="tab-pane container">
	<div class="card user-settings">
		<div class="card-body">
			<h4 class="line-head"></h4>
			<form action="{{$url}}" method="{{$method}}" class="form-horizontal" enctype="multipart/form-data">
				@csrf

				@if(isset($create))
				<div class=" form-group">
					<label class="control-label">Subir Archivo Excel para Productos</label>
					<input type="file" name="file" class="form-control @error('file') is-invalid @enderror" placeholder="Archivo Excel">
					@error('file')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class=" form-group">
					<label class="control-label">Subir Archivo Excel para Producos y mercados</label>
					<input type="file" name="file_market" class="form-control @error('file_market') is-invalid @enderror" placeholder="Archivo Excel">
					@error('file_market')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				@endif

	            <div class="form-group">
					<label class="control-label">Nombre</label>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name) }}"  autocomplete="name"  placeholder="Nombre">

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label class="control-label">Descripción</label>
					<textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Descripción">  {{ old('description', $product->description) }}   </textarea>
					@error('description')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label class="control-label">Mercado*</label>
					<select name="market_id" data-placeholder="Seleccionar una comuna" data-preselected="{{ old('market_id', $product->market_id) ? url('/admin/markets/get_single_market/' . old('market_id', $product->market_id)) : false }}" data-url="{{ url('/admin/markets/get_markets_select') }}" class="form-control ajaxSelect @error('market_id') is-invalid @enderror">
						
					</select>
					@error('market_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="form-group row mt-3">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>
							{{ __('Save') }}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>