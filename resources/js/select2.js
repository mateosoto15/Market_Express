$(document).ready(function(){
	$('.ajaxSelect').select2({
		placeholder: $('.ajaxSelect').data('placeholder'),
		ajax: {
			url : $('.ajaxSelect').data('url'),
			processResults: function (data) {
		    	return {
		    	  results: data
		    	};
			}
		}
	});

	//if isset a old or default value we search the value and then append to the select

	var preselected = $('.ajaxSelect');

	if(preselected.data('preselected')){
		$.ajax({
		    type: 'GET',
		    url: preselected.data('preselected')
		}).then(function (data) {
		    // create the option and append to Select2
		    data = JSON.parse(data);
		    var option = new Option(data.text, data.id, true, true);
		    preselected.append(option).trigger('change');

		    // manually trigger the `select2:select` event
		    preselected.trigger({
		        type: 'select2:select',
		        params: {
		            data: data
		        }
		    });
		});		
	}

	/**************************************************************


			THIS SECTION IS IN CASE THERE ARE MORE THAN ONE AJAX SELECT

	**************************************************************/
	$('.ajaxSelect2').select2({
		placeholder: $('.ajaxSelect2').data('placeholder'),
		ajax: {
			url : $('.ajaxSelect2').data('url'),
			processResults: function (data) {
		    	return {
		    	  results: data
		    	};
			}
		}
	});

	//if isset a old or default value we search the value and then append to the select

	var preselected2 = $('.ajaxSelect2');

	if(preselected2.data('preselected')){
		$.ajax({
		    type: 'GET',
		    url: preselected2.data('preselected')
		}).then(function (data) {
		    // create the option and append to Select2
		    data = JSON.parse(data);
		    var option = new Option(data.text, data.id, true, true);
		    preselected2.append(option).trigger('change');

		    // manually trigger the `select2:select` event
		    preselected2.trigger({
		        type: 'select2:select',
		        params: {
		            data: data
		        }
		    });
		});		
	}
	// ******************************************************
	

	$('.products').select2({
		placeholder: $('.products').data('placeholder'),
		ajax: {
			url : $('.products').data('url'),
			processResults: function (data) {
		    	return {
		    	  results: data
		    	};
			}
		}
	});


	//normal select
	$('.normalSelect').select2({
		placeholder: $('.normalSelect').data('placeholder')
	});
});