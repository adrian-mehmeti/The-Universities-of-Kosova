
$(document).ready(function(e){
	$("#search").keyup(function(){
 	$("#show_up").show();
	var text = $(this).val();
		$.ajax({
		type: 'GET',
		url: 'search.php',
		data: 'txt=' + text,
		success: function(data){
		$("#show_up").html(data);
		}
	});
	})
	});
