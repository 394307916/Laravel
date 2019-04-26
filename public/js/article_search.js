$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

$(function(){
	var old = '';

	setInterval(function(){
		var value = $("#article_search").val();
		var url = "/search";
		var token = "{{csrf_token()}}";
		if(value != old){
			old = value;
			$.ajax({
				type:'POST',
				url:url,
				data:{value:value},
				dataType:'json',
				success:function(data){
			//console.log(getJsonLength(data));
			if(jQuery.isEmptyObject(data)){
				$("#article_body").empty();
				$('.pagination').remove();
			}else{
				$('#article_body').empty();
				$('.pagination').remove();
				$.each(data,function(index,item){
					var html1 = '<div class="content-article"><li><a href="articles/'+data[index].id+'" title="'+data[index].description+'">';
					var html2 = '<div><div class="article_title">'+data[index].title+'<span class="article_author">';
					var html3 = '<span class="glyphicon glyphicon-time"></span>'+data[index].updated_at;
					var html4 = '</span></div></div></a></li></div>';
					var html5 = html1 + html2 + html3 + html4;
					$('#article_body').append(html5);
				});
				
			}
		}
	});
		}
	},500);
});