$(function() {

	// Get the form.
	var form = $('#contact-form');

	// Get the messages div.
	var formMessages = $('.form-message');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		// Serialize the form data.
		var formData = $(form).serialize();
		$('.submit').attr('disabled',true);
		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			
			$(formMessages).removeClass('alert-danger');
			$(formMessages).addClass('alert-success');
			$(formMessages).text("Votre message a été bien envoyé");
			$(formMessages).show();

			// Clear the form.
			$('#contact-form input,#contact-form textarea').val('');
			$('#contact-form').trigger("reset");
			$('.submit').attr('disabled',false);
		})
		.fail(function(data) {
			
			$(formMessages).removeClass('alert-success');
			$(formMessages).addClass('alert-danger');
			$(formMessages).text("Erreur d'envoi de message");
			$(formMessages).show();
			
			$('.submit').attr('disabled',false);
		});
	});

});
