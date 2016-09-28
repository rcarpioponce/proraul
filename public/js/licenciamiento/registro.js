var botones=0;



$("#btnguardarconsulta").click( function(){

botones=1;
Guardar();
/*$('#frmWarning').modal({
        backdrop: 'static',
        keyboard: true
    });
*/
   
});
         


$("#btnresponde").click( function(){
 botones=2;
$('#frmWarning').modal({
        backdrop: 'static',
        keyboard: true
    });
   
});

function btnWarningNO()
{
    $('#frmWarning').modal('hide'); 
}


$(document).on('click', '#btnWarningSI', function(){

   //alert(botones);
    if (botones==1)
    {
     Guardar();   
    }
    else
    {
    Updateconsulta();
    }
    
    
    $('#frmWarning').modal('hide'); 

    });



    $(document).on('click', '#btnWarningNO', function(){
        btnWarningNO();    
    });



function frmSuccess_msg(msg)
{
    var msg_temp = 'Se han grabado correctamente los datos.';
    if (msg == null)
    {
        $('#frmSucess_Body').html(msg_temp);
    }
    else if ($.trim(msg) != '')
    {
        $('#frmSucess_Body').html(msg);
    }
    else 
    {
        $('#frmSucess_Body').html(msg_temp);
    }
}


var form = $('#frmregistro');

function Guardar() {

   var datos = {
        'cboentidad' :  $('#cboentidad').val(),
        'txtcontacto' :  $('#txtcontacto').val(),
        'cbocargo' :  $('#cbocargo').val(),
        'txtcorreo' :  $('#txtcorreo').val(),
        'cbotema' :  $('#cbotema').val(),
        'cbotemadetalle' :  $('#cbotemadetalle').val(),
        'txtcomentario' :  $('#txtcomentario').val(),
        'cbouniversidad' :  $('#cbouniversidad').val(),

      
    };  

    //alert(JSON.stringify(datos));

    $.ajax({
        type: form.attr('method'),
        url: url_guardar,
        data:  datos,
        beforeSend: function(){
            $('#frmProcess').modal({
                backdrop: 'static',
                keyboard: false
            });            
        },
        complete: function(data){ 
             
        },
        success: function (data) {


            //$('#idconsulta').val(cod);
            //alert(JSON.stringify(data));
            $('#frmProcess').modal('toggle');   
          if(data.success == false)
            {
                var errores = '';
                for(datos in data.errors){
                    errores += '<li class="error">' + data.errors[datos] + '</li>';
                }
                $('#frmError_Body').html('<ul>' + errores + '</ul>');
                $('#frmError').modal('show');
            }
            else
            {
                //Refrescar();
                //$('#winDocente').modal('hide');
                $('#idconsulta').val("Se Generó el Código " + data);
                frmSuccess_msg('Se ha registrado su Consulta, Sú Código es: '+data);

                $('#frmSuccess').modal('show');
                LimpiarVentana();
            }            
        },
        error: function(errors){
            //alert(JSON.stringify(errors));
            $('#frmError_Body').html(JSON.stringify(errors));
            $('#frmProcess').modal('hide');
            $('#frmError').modal('show');
        }
    });
}  

function LimpiarVentana()
{   
    //var validator = $('#frmregistro').validate();
    //validator.resetForm();  
    $('#cboentidad').val('');
    $('#txtcontacto').val('');
    $('#cbocargo').val('');
    $('#txtcorreo').val('');
    $('#cbotema').val('0');
    $('#cbotemadetalle').val('0');
    $('#cbouniversidad').val('0');
    $('#txtcomentario').val('');
    $('#cbouniversidad').val('').trigger('chosen:updated');
    clearSelect('select.cbotemadetalle');
   
}


$('#btnConsulta').on('click', function(){
     //alert("s");
    consultaRegistro();     
});




function consultaRegistro()
{
    var datos = {
        'idconsulta' : $('#idconsulta').val()
    };        
    $.ajax({
        type: 'post',
        url: url_persona_buscar,
        data:  datos,
        beforeSend: function(){
          
        },
        complete: function(data){
            idcomentario.removeClass('invisible');
            idcomentario.removeClass('invisible');
        },
        success: function (data) {

            var registro = JSON.parse(data);
            //LimpiarVentana();
            $('#idxregistro').val(registro['IDX_REGISTRO']);
            $('#cboentidad').val(registro['DES_ENTIDAD']);
            $('#cbocargo').val(registro['DES_CARGO']);
            $('#txtcontacto').val(registro['NOMBRE_CONTACTO']);
            $('#txtcorreo').val(registro['EMAIL']);
            $('#txtcomentario').val(registro['DESCRIPCION_CONSULTA']);
            $('#cbotema').val(registro['IDX_TEMA']);
            $('#cbotemadetalle').val(registro['IDX_TEMA_DETALLE']);
            $('#cboestado').val(registro['ESTADO']);
            $('#txtrespuesta').val(registro['RESPUESTA']);

            $('#cboestadopublic').val(registro['ESTADO_PUBLICO']);

    
            
            if (registro['FOUND'] < 1) 
            {
                     
                $('#frmError_Body').html('No se han encontrado los datos de su consulta.');
                $('#frmProcess').modal('hide');
                $('#frmError').modal('show');
                
              

                    
                                   
            }
            else
            {
             $("#btnAdmGuardar").removeClass('invisible').addClass('visible');
                $('#frmProcess').modal('hide');
            }


        },
        error: function(errors){
            
        }
    });        
}


$('#btnConsultaweb').on('click', function(){
     //alert("s");
    Buscarconsulta();     
});


function Buscarconsulta()
{
    var datos = {
        'fechaini' : $('#desde').val(),
        'fechafin' : $('#hasta').val(),

    };        
    $.ajax({
        type: 'post',
        url: url_persona_buscar,
        data:  datos,
        beforeSend: function(){
          
        },
        complete: function(data){
        },
        success: function (data) {
            var registro = JSON.parse(data);
            $('#cboentidad').val(registro['DES_ENTIDAD']);
            $('#cbocargo').val(registro['DES_CARGO']);
            $('#txtcontacto').val(registro['NOMBRE_CONTACTO']);
            $('#txtcorreo').val(registro['EMAIL']);
            $('#txtcomentario').val(registro['DESCRIPCION_CONSULTA']);
            $('#cbotema').val(registro['IDX_TEMA']);
            $('#cbotemadetalle').val(registro['IDX_TEMA_DETALLE']);
            $('#consultaRegistro').attr('disabled',false);

        },
        error: function(errors){
            //alert(JSON.stringify(errors));
            //$('#frmError_Body').html(JSON.stringify(errors));
            //$('#frmProcess').modal('hide');
            //$('#frmError').modal('show');                
        }
    });        
}

/*
$("#btnguardarconsulta").click( function(){

    opcion=2;
$('#frmWarning').modal({


        backdrop: 'static',
        keyboard: true
    });
   
});
*/
         



var form2 = $('#frmDatoResponsable');

function Updateconsulta() {

   
   var datos = {
        'idxregistro' :  $('#idxregistro').val(),
        'txtrespuesta' :  $('#txtrespuesta').val(),
        'cboestado' :  $('#cboestado').val(),
        
    };  
    $.ajax({
        type: form2.attr('method'),
        url: url_responder,
        data:  datos,
        beforeSend: function(){
            $('#frmProcess').modal({
                backdrop: 'static',
                keyboard: false
            });            
        },
        complete: function(data){      
        },
        success: function (data) {

            $('#frmProcess').modal('toggle');   
            if(data.success == false)
            {
                var errores = '';
                for(datos in data.errors){
                    errores += '<li class="error">' + data.errors[datos] + '</li>';
                }
                $('#frmError_Body').html('<ul>' + errores + '</ul>');
                $('#frmError').modal('show');
            }
            else
            {
                //Refrescar();
                $('#winregistro').modal('hide');
                frmSuccess_msg('Se ha Enviado su Respuesta.');
                $('#frmSuccess').modal('show');
            }            
        },
        error: function(errors){
            //alert(JSON.stringify(errors));
            $('#frmError_Body').html(JSON.stringify(errors));
            $('#frmProcess').modal('hide');
            $('#frmError').modal('show');
        }
    });
}  

/*
$(document).ready(function() {

   LimpiarVentana();
});
*/
