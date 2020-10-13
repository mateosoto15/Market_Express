$(document).ready(function(){
	//dateTime for start
	$('#start').datetimepicker({
		format: 'YYYY-MM-DD H:m:s',
	});

	//dateTime for end
	$('#end').datetimepicker({
		format: 'YYYY-MM-DD H:m:s',
	});
});