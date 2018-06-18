$(document).ready(function(){

	$('#table-box').load('registros.php');

	$('#fkasnet').submit(function(e){
		e.preventDefault();
		var data = $(this).serializeArray();
		data.push({name:'tag',value:'registrar'});

		$.ajax({
			url: 'calculo.php',
			type: 'POST',
			dataType: 'json',
			data: data,
		})
		.done(function() {
			$('#table-box').load('registros.php');
			$('.form-kasnet input[type="text"]').val("");
			$('.form-kasnet input[type="number"]').val("");
		})
		.fail(function() {
			$('.aviso').fadeIn('fast');
			setTimeout(function(){
				$('.aviso').fadeOut();
			},4000);
		})
		.always(function() {
			console.log("complete");
		});
		
	})

	$('#f-fecha').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		data.push({name:'tag',value:'buscarfecha'});
		
		$.ajax({
			url: 'calculo.php',
			type: 'POST',
			dataType: 'json',
			data: data,
		})
		.done(function() {
			$('#table-box').load('calculo.php');
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	})


})
