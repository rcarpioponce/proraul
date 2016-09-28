//var urlBase = 'http://licenciamientodesa.sunedu.gob.pe/'
var urlBase      = window.location.href

function clearSelect(selector){
	$(selector).empty();
	var option = $('<option>');
	option.val('0');
	option.append('Seleccionar');
	$(selector).append(option);
}

function getTema(selector){
	var request = $.ajax({
	  url: urlBase + 'tema',
	  method: "GET",
	  dataType: "JSON"
	});
	request.done(function( data ) {
	   var option,i;
	  $(selector).empty();
	  option = $('<option>');
	  option.val('0');
	  option.append('Seleccionar');
	  $(selector).append(option);
	  for(i=0;i<data.length;i++){
	  	option = $('<option>');
	  	
	  	option.val(data[i]['ID_TEMA']);
	  	option.append(data[i]['DESCRIPCION']);
	  	$(selector).append(option);
	  }
	}); 
	request.fail(function( jqXHR, textStatus ) {
	  console.log( "Request failed: " +  textStatus ,request);
	});	
}


function getTemadetalle(selector, idDpto){
	var request = $.ajax({
	  url: urlBase + 'tema/detalle/' + idDpto,
	  method: "GET",
	  dataType: "JSON"
	}); 
	request.done(function( data ) {  
	  var option,i;
	  $(selector).empty();
	  option = $('<option>');
	  option.val('0');
	  option.append('Seleccionar');
	  $(selector).append(option);
	  for(i=0;i<data.length;i++){
	  	option = $('<option>');
	  	option.val(data[i]['ID_TEMA_DETALLE']);
	  	option.append(data[i]['DESCRIPCION']);
	  	$(selector).append(option);
	  }
	}); 
	request.fail(function( jqXHR, textStatus ) {
	  console.log( "Request failed: " +  textStatus , request);
	});	
}



function getUniversidad(selector){
	var request = $.ajax({
	  url: urlBase + 'universidad',
	  method: "GET",
	  dataType: "JSON"
	});
	request.done(function( data ) {
	  var option,i;
	  for(i=0;i<data.length;i++){
	  	option = $('<option>');
	  	option.val(data[i]['IDX_UNIVERSIDAD']);
	  	option.append(data[i]['NOM_UNIV_RESOLUCION']);
	  	$(selector).append(option);
	  }
	}); 
	request.fail(function( jqXHR, textStatus ) {
	  console.log( "Request failed: " +  textStatus ,request);
	});	

}
