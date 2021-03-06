$(document).ready(function(){
    /*console.log('jQuery instalado');*/
    var datatable_translation = 
	$("a").tooltip({
    	'selector': '',
    	'placement': 'right',
    	'container':'body'
	});
	
    $('.dataTables-cumples, #dtDoc, .dtDocUni, .mostrarDocExt, .dtAdmin').dataTable({
        responsive: true,
        "language": {"lengthMenu":"Mostrar _MENU_ registros por página","zeroRecords":"No se encontró registro","info":"Mostrando la página _PAGE_ de _PAGES_","infoEmpty":"No hay registros disponibles","infoFiltered":"(filtrado de _MAX_ registros totales)","search": "Buscar: ","searchPlaceholder": "Filtrar resultados...","processing": "Procesando...","paginate": {"first":"Primero","previous":"Anterior","next":"Siguiente","last":"Último"}}
    });
    
    $.fn.datepicker.dates['es'] = {
        days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
        daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        today: "Hoy",
        monthsTitle: "Meses",
        clear: "Borrar",
        weekStart: 1,
        format: "dd/mm/yyyy"
    };
    $('#data_1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: 'dd/mm/yyyy',
        language: 'es'
    });
    $('#dp_cumpleanos .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: 'dd/mm',
        language: 'es'
    });

    $("input:file").change(function (){
       var fileName = $(this).val();
       $("#nomFileDocumento").val(fileName);
    });

    $(".nombreArchivo, .descripArchivo, .correos").blur(function(){
        var name=$(this).val();
        $(this).next(".btn-danger").remove();
        if(name.length == 0){
            $(this).after('<div class="btn-danger">Este campo es obligatorio</div>');
        } else {
            return true;
        }
    });
});