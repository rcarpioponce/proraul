@extends('wsusu.master-layout')
@section('contenido_principal')
<!--<div class="container-fluid">-->



<center>
  <h3>CONFIGURACION DE USUARIOS</h3>
</center>

<div id="appUsuarios">
<form class="form-group">

  <div class="row">
    <div class="col-md-4">
      <label>Cod. Acceso:</label>
          <input type="text" name="des_log" class="form-control" v-model="filtro.codacceso">
    </div>

    <div class="col-md-4">
      <label>Nivel:</label>
      <select class="form-control"  v-model="filtro.nivel">
          <option value=""> Seleccione </option>
          <option value="1"> Básico </option>
          <option value="2"> Intermedio </option>
          <option value="3"> Complejo </option>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
        <label class="" >Entidad:</label>
        <input type="text" name="des_ent" class="form-control" v-model="filtro.entidad">
    </div>


    <div class="col-md-4">
      <div class="">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUsuario" @click="btnAgregar"><i class="glyphicon glyphicon-plus"></i> AGREGAR</button>
          <span class="btn btn-warning" @click="getUsuarios($event)"><i class="glyphicon glyphicon-search" ></i> BUSCAR</span>
      </div>
    </div>
  </div>
<!--   <pre>
  @{{$data | json }}
</pre> -->
</form>

<div class="container-fluid">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Entidad</th>
        <th>Acceso</th>
        <th>IP-Enlace</th>
        <th>Limite de Consultas</th>
        <th>Nivel</th>
        <th>Fecha Convenio</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <template v-for="us in arUsuarios">
        <row-usuario    
                        :id            ="us.ID_USUA_WEB"
                        :entidad       ="us.DES_ENT"
                        :entidadlarga  ="us.DES_ENT_LARGA"
                        :acceso        ="us.DES_LOG"
                        :maxhor        ="us.MAX_HOR"
                        :maxdia        ="us.MAX_DIA"
                        :maxmes        ="us.MAX_MES"
                        :ip            ="us.DES_ENLACE"
                        :limitconsulta ="us.MAX_MES"
                        :nivel         ="us.NIVEL_CONSULTA"
                        :fechaconvenio ="us.FEC_CONVENIO"
                        :estado        ="us.BIT_ESTADO"
                        :dnicontacto   ="us.DNI_CONTACTO"
                        :nomcontacto   ="us.NOMBRE_CONTACTO"
                        >
      </row-usuario>
      </template>
    </tbody>
  </table>
</div>
@include('wsusu.vuejs.popupusuario')
</div>

@stop
@include('wsusu.vuejs.rowusuario')
@section('carga_footer')
  <script src="{{asset('js/vuejs/vue.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>
  <script src="{{asset('js/vuejs/vue.mod.usuario.js')}}"></script>
  <script src="{{asset('js/plugins/switchery/switchery.js')}}"></script>
  <link href="{{asset('css/plugins/switchery/switchery.css')}}" rel="stylesheet"></link>
@stop