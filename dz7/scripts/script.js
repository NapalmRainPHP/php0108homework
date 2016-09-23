var messageBox= function(message) {
	$('#messagebox').html(message);
	window.setTimeout(function() {$('#messagebox').html('');}, 5000);
}

var sendForm = function(e) {
	e.preventDefault();
	var form = $(this);
	var reload = form.attr('reload');
	$.ajax({
		url : form.attr('action'),
		type : form.attr('method'),
		data : form.serialize(),
		async : true,
		success : function (resp) {
			console.log(resp);
			var result = $.parseJSON(resp);
			if (result.error) {
				messageBox(result.errorcode);
			} else {
				if (reload==='false') {
					messageBox(result.errorcode);
				} else {
					location.href='index';
				}
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
			var xhr = $.ajaxSettings.xhr();
			xhr.upload.addEventListener('progress', function(evt){
				if(evt.lengthComputable) {
					var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
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

var deleteFile = function() {
	var filename = $(this).attr('filename');
	$.ajax({
		url : 'deletefile.php',
		type : 'POST',
		data : 'filename='+filename,
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

var prepareRename = function() {
	var s = $('.withForm').find('.oldname').attr('value');
	$('.withForm').html(s);
	$('.withForm').removeClass('withForm');
	var object = $(this);
	var name = object.attr('filename');
	var td = object.parent().parent().find('.namefile')
	td.addClass('withForm');
	td.html('<form action="renamefile.php" method="POST" id="renameForm"><input type="text" name="newname" value="'+name+'"><input type="hidden" class="oldname" name="oldname" value="'+name+'"></input><input type="submit" value="Сохранить"></form>');
	$('#renameForm').bind('submit', sendForm);
}

$('document').ready(function() {
	$('#loginForm').bind('submit', sendForm);
	$('#regForm').bind('submit', sendForm);
	$('#profileForm').bind('submit', sendForm);
	var uploadForm = $('#uploadForm');
	var fileInput = $('#fileInput');

	uploadForm.bind('submit', loadImage);
	fileInput.bind('change', function() {uploadForm.submit();});
	$('.rename').click('click', prepareRename);
	$('.delete').click('click', deleteFile);
});