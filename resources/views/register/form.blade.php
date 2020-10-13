<div class="tab-pane container">
	<div class="card user-settings">
		<div class="card-body">
			<h4 class="line-head"></h4>
			<form action="{{$url}}" method="{{$method}}" class="form-horizontal" enctype="multipart/form-data">
				@csrf

				@if(isset($create))
				<div class=" form-group">
					<label class="control-label">Subir Archivo Excel</label>
					<input type="file" name="file" class="form-control @error('file') is-invalid @enderror" placeholder="Archivo Excel">
					@error('file')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				@endif

	            <div class="form-group">
					<label class="control-label">Nombre</label>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}"  autocomplete="name" placeholder="Nombres">

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label class="control-label">E-mail</label>
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}"  autocomplete="email" placeholder="E-mail">

					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				
				<div class="form-group">
                    <label class="control-label">Role</label>
                    <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" >
                        <option value="">Seleccionar un role</option>
                        @foreach($roles as $role)
                            @if($role->name === 'Admin'){{-- Solo usuarios que pueden hacer administradores pueden crear administradores --}}
                                @can('makeAdmin', App\Models\User::class) 
                                    <option value="{{ $role->id }}" {{ (old('role_id', $user->role_id) == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endcan
                            @else
                                <option value="{{ $role->id }}" {{ (old('role_id', $user->role_id) == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
				
				<div class="form-group">
					<label class="control-label">Sub Grupo*</label>
					<select name="sub_group_id" data-placeholder="Seleccionar una comuna" data-preselected="{{ old('sub_group_id', $user->sub_group_id) ? url('/admin/sub_groups/get_single_sub_group/' . old('sub_group_id', $user->sub_group_id)) : false }}" data-url="{{ url('/admin/sub_groups/get_sub_groups_select') }}" class="form-control ajaxSelect @error('sub_group_id') is-invalid @enderror">
						
					</select>
					@error('sub_group_id')
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