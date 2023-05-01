$(document).ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	})
	$(document).on('change','.display_main_news',function(){
		var val = 0;
		var url = $(".news-update-display-main").val()
		var news_id = $(this).attr('data-id');
		if($(this).prop("checked") == true){
			val = 1;
		}
		var data = {
			val:val,
			news_id:news_id,
		}
		$.ajax({
			type: "POST",
			url: url,
			data: data,
			success:function(data){
				console.log(data);
			}
		})
	})
	$(document).on('change','.display_main_training',function(){
		var val = 0;
		var url = $(".training-update-display-main").val()
		var training_id = $(this).attr('data-id');
		if($(this).prop("checked") == true){
			val = 1;
		}
		var data = {
			val:val,
			training_id:training_id,
		}
		$.ajax({
			type: "POST",
			url: url,
			data: data,
			success:function(data){
				console.log(data);
			}
		})
	})
})