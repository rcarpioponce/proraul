$(document).on('ready',function(){
	$('#formBuscar').submit(function(e){
		$('#accordionResult').html('<div class="loader">Cargando...</div>');
		$('#panelResultados').removeClass('hidden');
		$('.btn-success').html('<i class="fa fa-clock-o"></i> BUSCANDO...');
		e.preventDefault();
		var fd = new FormData();
		var url = "busqueda";
		var html = '';
		var i = 0;
		fd.append('busqueda',$('#busqueda').val());
		fd.append('claveDoc',$('#claveDoc').val());
		fd.append('areaDoc',$('#areaDoc').val());
		fd.append('tipoDoc',$('#tipoDoc').val());
		fd.append('tipoAnalisis',$('#tipoAnalisis').val());
		fd.append('subsectorDoc',$('#subsectorDoc').val());
		fd.append('entidadesDoc',$('#entidadesDoc').val());
		$.ajax({
			type: 'POST',
			cache: false,
			processData: false,
			contentType: false,
			url: url,
			data: fd,
			success:function(data){
				$('.btn-success').html('<i class="fa fa-search"></i> BUSCAR');
				if(data.length>0){
					$.each(data, function(index,value) {
						console.log(data);
						html = html+'<div class="panel panel-default"><div class="panel-heading"><h5 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse'+i+'">'+value.DES_TITU_DOCUMENTO+'</a></h5><p><small>FECHA: '+value.FEC_DOCUMENTO+' | <a href="../getdoc/'+value.IDX_OBJETO_TABLA+'" target="_blank">VER DOCUMENTO</a></small></p><p>'+value.DES_SUMILLA+'</p></div><div id="collapse'+i+'" class="panel-collapse collapse"><div class="panel-body"><div class="panel blank-panel"><div class="panel-heading"><div class="panel-title m-b-md"></div><div class="panel-options"><ul class="nav nav-tabs"><li class="active"><a data-toggle="tab" href="#tab-1-'+i+'">SUMILLA</a></li><li class=""><a data-toggle="tab" href="#tab-2-'+i+'">RESUMEN</a></li><li class=""><a data-toggle="tab" href="#tab-3-'+i+'">CONCLUSIONES</a></li><li class=""><a data-toggle="tab" href="#tab-4-'+i+'">NORMAS</a></li><li class=""><a data-toggle="tab" href="#tab-5-'+i+'">PALABRAS CLAVE</a></li></ul></div></div><div class="panel-body"><div class="tab-content"><div id="tab-1-'+i+'" class="tab-pane active">'+value.DES_SUMILLA+'</div><div id="tab-2-'+i+'" class="tab-pane">'+value.DES_RESUMEN+'</div><div id="tab-3-'+i+'" class="tab-pane">'+value.DES_CONCLUSIONES+'</div><div id="tab-4-'+i+'" class="tab-pane">'+value.DES_NORMAS+'</div><div id="tab-5-'+i+'" class="tab-pane">'+value.DES_PALA_CLAVE+'</div></div></div></div></div></div></div>';
						i++;
					});
				} else {
					html = '<h2>La búsqueda no obtuvo ningún resultado.</h2>'
				}
				$('#accordionResult').html(html);
			}
		});
	});
});