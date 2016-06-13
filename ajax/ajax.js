$('#goto').click(function(){
	$.ajax({
		type:'GET',
		url:'test.php',
		dataType:'jsonp',
		success:function(ret){
			$.each(ret.items, function(i,item){
				console.log(item);
			});
		}
	});
});
