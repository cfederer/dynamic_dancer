$(document).ready(function(){
	$('#addDancer').click(function(){
		var i = parseInt($('#numDancers').val()) + 1;
		$.post($('#siteUrl').val() + '/dance/ajaxAddNewDancer/' + i, function(data){
			$('#dancers').append(data);
			$('#numDancers').val(i);
		});
	});
});
