/*function format_date(fecha){
	if (fecha != null){
		var date = new Date(fecha.substr(0,10));
		fecha = (date.getDate()+1) + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
		return fecha;
	}
};*/

function format_date(fecha) {
  return fecha
}

function dibujarPdfDoc(idFile){
	if (idFile != null){
		var embed = $('<embed>');
		embed.attr({
			type: 'application/pdf',
			width: '100%',
			height: '100%',
			src: "getdoc/" + idFile
		});
	} else {
		var embed = $('<div align="center"><h2>El documento no existe en la base de datos.</h2></div>');
	}
	return embed;
}

function isEmail(email) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}