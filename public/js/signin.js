$(function () {
	
	$("#createUserBtn").attr('disabled', true);
	$('#terms').change(function() {
	 if ($('#terms').is(':checked')) {	       
	 	$("#createUserBtn").attr('disabled', false);
	 } else {
	 	$("#createUserBtn").attr('disabled', true);
	 }
	});
	
	
	
	jQuery.support.placeholder = false;
	test = document.createElement('input');
	if('placeholder' in test) jQuery.support.placeholder = true;
	
	if (!$.support.placeholder) {
		$('.field').find ('label').show ();
	}
	
});