var messageBox= function(message) {
	$('#messagebox').html(message);
	window.setTimeout(function() {$('#messagebox').html('');}, 2000);
}
var sendForm = function(e) {
	e.preventDefault();
	var form = $(this);
	$.ajax({
		url : form.attr('action'),
		type : form.attr('method'),
		data : form.serialize(),
		async : true,
		success : function (resp) {
			var result = $.parseJSON(resp);
			if (result.error) {
				messageBox(result.errorcode);
			} else {
				location.reload();
			}
		}
	});

}

var loadImage = function(e) {
	e.preventDefault();
	console.log('0');
	var form = $(this);
	var formData = new FormData(form.get(0));
	$.ajax({
		url: form.attr('action'),
		type: form.attr('method'),
		contentType: false,
		processData: false,
		data: formData,
		dataType: 'json',
		xhr: function(){
			console.log('1');
			var xhr = $.ajaxSettings.xhr(); // получаем объект XMLHttpRequest
			xhr.upload.addEventListener('progress', function(evt){ // добавляем обработчик события progress (onprogress)
				if(evt.lengthComputable) { // если известно количество байт
					// высчитываем процент загруженного
					var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
					// устанавливаем значение в атрибут value тега <progress>
					// и это же значение альтернативным текстом для браузеров, не поддерживающих <progress>
					$('#pbar').css({'width': percentComplete+'%'});
					$('#progress').text(percentComplete);
				}
			}, false);
			return xhr;
		},
		success: function(result){
			if (result.error) {
				messageBox(result.errorcode);
				$('#pbar').css({'width': '0%'});
				$('#progress').text('');
			}
		}
	});
}

$('document').ready(function() {
	$('#loginForm').bind('submit', sendForm);
	$('#profileForm').bind('submit', sendForm);
	var uploadForm = $('#uploadForm');
	var fileInput = $('#fileInput');

	uploadForm.bind('submit', loadImage);
	fileInput.bind('change', function() {uploadForm.submit();});
});