<div id="frmProcess" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm" style="width:250px;">
        <div class="panel panel-warning animated bounceInRight">
            <div class="panel-heading" style="font-size:16px;">
                <!--
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                -->
                <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>
                <span id="frmProcess_Header">&nbsp;Procesando ...</span>
            </div>
            <div id="frmProcess_Body" class="panel-body ibox-content" style="padding: 10px; height:40px;">
                <div class="progress progress-striped active">
                    <div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" role="progressbar" class="progress-bar progress-bar-warning">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 


<div id="frmSuccess" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:500;">
        <div class="panel panel-success animated bounceInRight">
            <div class="panel-heading" style="font-size:16px;">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <i class="fa fa-check"></i>
                <span id="frmSucces_Header">&nbsp;Finalizado.<span>
            </div>
            <center>
            <div id ="frmSucess_Body" class="panel-body ibox-content">
                Se han grabado correctamente los datos.
            </div>
            </center>
        </div>
    </div>
</div> 

<div id="frmError" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:500;">
        <div class="panel panel-danger animated bounceInRight">
            <div class="panel-heading" style="font-size:16px;">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <i class="fa fa-exclamation-triangle"></i>
                <span id="frmError_Header">&nbsp;Error en la operaci&oacute;n.</span>
            </div>
            <div id="frmError_Body" class="panel-body ibox-content">
            </div>
        </div>
    </div>
</div> 

<div id="frmWarning" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm" style="width:500;  max-width: 350px;">
        <div class="panel panel-warning animated bounceInRight">
            <div class="panel-heading" style="font-size:16px;">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <i class="fa fa-exclamation-triangle"></i>
                &nbsp;<span id="frmWarning_Header">Advertencia</span>&nbsp;&nbsp;
            </div>
            <div id="frmWarning_Body" class="panel-body ibox-content" style="padding:13px 0px 0px 0px;">
                <div class="form-group">
                    <div class="col-md-12">
                        <span id="txtWarning" style="margin-bottom:8px;">
                            Si desea continuar con la operaci&oacute;n:</br>
                            <br>&nbsp;&nbsp;&nbsp;- Dar click en el bot&oacute;n <strong>"Continuar"</strong>.
                            <br>&nbsp;&nbsp;&nbsp;- En caso contrario dar click en el bot&oacute;n <strong>"Cerrar"</strong>.
                        </span>
                        <br><br>
                    </div>
                    
                </div>                
                <div class="form-group pull-right">
                    <div class="col-md-12">
                        <button id="btnWarningSI" type="button" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Continuar</button>
                        &nbsp;                            
                        <button id="btnWarningNO" type="button" class="btn btn-warning"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>