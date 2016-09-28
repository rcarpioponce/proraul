<div class="modal fade" id="modalUsuario"  role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Gestionar Usuario</h4>
      </div>
      <div class="modal-body" style="background-color: #ECF0F5 !important;">
        <form class="">
         <div class="form-group">
           <label>Entidad</label>
           <input type="text" class="form-control" v-model="new_usuario.DES_ENT">
         </div>
         <div class="form-group">
           <label>Nombre completo de la entidad</label>
           <input type="text" class="form-control" v-model="new_usuario.DES_ENT_LARGA">
         </div>
         <div class="row">
           <div class="col-lg-6 form-group">
             <label>Usuario (Login)</label>
             <input type="text" class="form-control" v-model="new_usuario.DES_LOG">
           </div>
           <div class="col-lg-6 form-group">
             <label>Clave (Password)</label>
             <input type="password" class="form-control" v-model="new_usuario.DES_PAS">             
           </div>
         </div>
         <div class="form-group">
           <label>Ip - Enlace</label>
           <textarea class="form-control" v-model="new_usuario.DES_ENLACE"></textarea>
         </div>
         <div class="form-group">
           <label for="">Limite de Consumo</label>
           <div class="row">
             <div class="col-lg-4">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                <input type="text" v-model="new_usuario.MAX_HOR" class="form-control">                
              </div>    
             </div>
             <div class="col-lg-4">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-sun-o" aria-hidden="true"></i></span>
                <input type="text" v-model="new_usuario.MAX_DIA" class="form-control">
              </div>
             </div>
             <div class="col-lg-4">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                <input type="text" v-model="new_usuario.MAX_MES" class="form-control">
              </div>
             </div>
           </div>
         </div>
         <div class="form-group">
           <label>Nivel</label>
           <select class="form-control"  v-model="new_usuario.NIVEL_CONSULTA">
                <option value="">Seleccione</option>
                <option value="1">Básico</option>
                <option value="2">Intermedio</option>
                <option value="3">Complejo</option>
           </select>           
         </div>
         <div class="form-group">
           <label>Docs de Convenio</label>
           <input type="file">
         </div>
         <div class="form-group">
           <label>Fecha de Convenio</label>
           <input type="text" class="form-control" v-model="new_usuario.FEC_CONVENIO">
         </div>
         <div class="row">
           <div class="col-lg-6">
             <label>DNI del Contacto</label>
             <input type="text" class="form-control" v-model="new_usuario.DNI_CONTACTO">
           </div>
           <div class="col-lg-6">
             <label>Contacto</label>
             <input type="text" class="form-control" v-model="new_usuario.NOMBRE_CONTACTO">
           </div>
         </div>                   
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="addUsuario($event)">Guardar</button>
      </div>
    </div>
  </div>
</div>