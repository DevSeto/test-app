function setValidationMessages( form, data ) {
	$(form).find(`[name=${data.key}]`).addClass('has-error');
	$(form).find(`[name=${data.key}]`).after(`<span class="red-font error-message">${data.value}</span>`);
};

function resetForm(form) {
	$(form).find('.has-error').removeClass('has-error');
	$(form).find('.error-message').remove();
	$(form).trigger("reset");
}

function updateComment(e, id) {
	let formData = new FormData();
	formData.append('body',$(e.target).val());
	$.ajax({
		url: $(e.target).attr('data-action'),
		data: formData,
		processData: false,
		contentType: false,
		type: 'post',
		success: function(data){
			if(data.success){
				alert("the comment is successfully updated");
				location.reload();
			}
		},
		error: function (error) {
			const response = error.responseJSON;
			if (response.data.unauthorized){
				alert("401 Unauthorized Error");
				location.reload();
			}
		}
	});
}

$(document).ready(function () {

	$('#add-task').on('hidden.bs.modal', function (e) {
		resetForm($(e.target).find('form'));
	});

	$(document).on('click','.toDone', function (e) {
		$.ajax({
			url: $(e.target).attr('data-href'),
			type: 'GET',
			success: function(data){
				location.reload();
			},
		});
	});

	$(document).on('submit','#add-task', function (e) {
		e.preventDefault();
		e.stopPropagation();
		let formData = new FormData(this);
		$.ajax({
			url: $(e.target).attr('action'),
			data: formData,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(data){
				alert("the task is successfully added");
				location.reload();
			},
			error: function (error) {
				const response = error.responseJSON;
				console.log(response)
				$.each( response.data, function( key, value ) {
					setValidationMessages(e.target, {key, value});
				});
			}
		});
	})
});