$(document).ready(function(){

	$('.formulaire').submit(function(){
		var nom = $('.nom').val();
		var message = $('.message').val();

		$.post('send.php', {nom:nom,message:message}, function(donnees){
			$('.return').html(donnees).slideDown();
			$('.nom').val('');
			$('.message').val('');
		});
		return false;
	});
});