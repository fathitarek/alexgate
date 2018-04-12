   $(function() {
        $('.lazy').lazy({
            placeholder: "data:image/gif;base64,R0lGODlhEALAPQAPzl5uLr9Nrl8e7..."
        });
    });
$( document ).ready(function() {


    $('font').contents().unwrap();


$("#sendphone").click(function() {
	if ($('.phname').val() == '' || $('.phnumber').val() == ''){
		$('.phmessage').show('slow');}else{	$('#form-map').submit();}
		return false;});
		
		var $email = $('#form-contact-email').val();
		var re = /^(([^<>()[]\.,;:s@"]+(.[^<>()[]\.,;:s@"]+)*)|(".+"))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/igm;
		$("#form-contact-agent-submit").click(function() {
			if ($('#form-contact-name').val() == '' || $('#form-contact-email').val() == '' || $('#form-contact-phone').val() == '' || $('#form-contact-message').val() == '')
			{
				$('.phmessage').show('slow');
				}
				else if(!re.test($email.val())){     
				$('.phmessage').show('slow');
				}
			else if($('#form-contact-message').length < 10 ){
				$('.phmessage').hide('slow');			
				$('.messlegnth').show('slow');
				}
				else{	
				$('#form-contact').submit();
				}return false;
				});
$('font[size]').removeAttr('size');
$(".loc").click(function() {
    $('html,body').animate({
        scrollTop: $("#property-map").offset().top},
        'slow');
});






});