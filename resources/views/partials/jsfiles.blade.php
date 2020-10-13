	<script src="{{ url('js/app.js') }}" ></script>
	@if(Route::getCurrentRoute()->getPrefix() == '/admin')
		<script src="{{ url('js/panelApp.js') }}"></script>
	@endif
	<script src="{{url('js/sweetalert.min.js')}}"></script>
	<script src="{{url('js/delete.js')}}"></script>
	<!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
	