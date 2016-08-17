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
$('document').ready(function() {
	$('#loginForm').bind('submit', sendForm);
	$('#profileForm').bind('submit', sendForm);
});