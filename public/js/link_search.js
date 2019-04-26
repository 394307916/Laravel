$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

$(function(){
	var old = '';

	setInterval(function(){
		var value = $("#link_search").val();
		var url = "/linksearch";
		var token = "{{csrf_token()}}";
		if(value != old){
			old = value;
		$.ajax({
			type:'POST',
			url:url,
			data:{value:value},
			dataType:'json',
			success:function(data){
				if(jQuery.isEmptyObject(data)){
					$('#all_link').empty();
				}else{
					$('#all_link').empty();
					$.each(data,function(index,item){
						var html = '<p><a href="'+data[index].address+'" data-hover="'+data[index].name+'" target="_blank">'+data[index].name+'</a></p>';
						$('#all_link').append(html);					
					});					
				}						
			}
		});
	}
	},500);
});