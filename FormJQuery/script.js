$(document).ready(function(){

	var result = true;

	$('#form').submit(function(){
		if ($('#email').val() == '') {
			$('#email').attr('placeholder', 'Je ne peux pas etre vide').parent().addClass('has-error')
		}
	});
});