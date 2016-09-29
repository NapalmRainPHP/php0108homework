var messageBox= function(message) {
	$('#messagebox').html(message);
	window.setTimeout(function() {$('#messagebox').html('');}, 5000);
}

var getList = function(obj) {
	var l = $.makeArray(obj);
	var ul = document.createElement('ul');
	for (var key in l) {
		var val = l[key];
		var li = document.createElement('li');
		$(li).html(val[0].Name);
		console.log();
		if (val.childs.length>0) {
			var s = getList(val.childs);
			$(li).append(s);
		}
		$(ul).append(li);
	}
	return ul;
}

var getCategories = function(cat) {
	var obj = $('#contentConteiner');
	$.ajax({
		url : 'catalog/'+cat,
		type : 'GET',
		async : true,
		success : function (resp) {
			//console.log(resp);
			var result = $.parseJSON(resp);
			console.log(result);
			if (result.error) {
				messageBox(result.errorcode);
			} else {
				var list = $.makeArray(result.response);
				var l = document.createElement('ul');
				for ( var key in list) {
					var val = list[key];
					var li = document.createElement('li');
					$(li).html(val[0].Name);
					if (val.childs.length>0) {
						var s = getList(val.childs);
						$(li).append(s);
					}
					$(l).append(li);
				}
				obj.append(l);
			}
		}
	});
}

var sendVKPost = function(e) {
	var form = $(this);
	e.preventDefault();
	$.ajax({
		url : form.attr('action'),
		type : 'POST',
		async : true,
		data : form.serialize(),
		success : function (resp) {

			var result = $.parseJSON(resp);
			console.log(result);
			if (result.error) {
				messageBox(result.error.error_msg);
			} else {
				alert('Запись успешно размещена');
			}
		}
	});
}

$(document).ready(function() {
	getCategories('all'); // можно вместо all указывать id категории и получать её дерево
	$('#vkpostform').submit(sendVKPost);
});