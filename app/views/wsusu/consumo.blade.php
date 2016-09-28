@extends('wsusu.master-layout')
@section('contenido_principal')
<!--<div class="container-fluid">-->



<center>
  <h3>CONSUMO</h3> 
</center>

<div id="appConsultas">
@{{message}}
<form class="form-inline">
  <div class="form-group">
    <label for="">Fecha inicio</label>
    <input type="text" class="form-control" v-model="filtro.fechaini">
  </div>
  <div class="form-group">
    <label for="">Fecha fin</label>
    <input type="text" class="form-control" v-model="filtro.fechafin">
  </div>
  <div class="form-group">
    <label for="">Entidad</label>
    <select class="form-control" v-model="filtro.entidad">
      <option value="">Seleccione...</option>
      <template v-for="en in arEntidades">
        <option value="@{{en.ID_USUA_WEB}}">@{{en.DES_ENT}}</option>
      </template>
    </select>
  </div>
  <div class="form-group">
    <label for="">Numero de doc</label>
    <input type="text" class="form-control" v-model="filtro.numdoc">
  </div>
  <button class="btn btn-primary" @click="getResultados($event)">Buscar</button>    
</form>

  <!-- <pre>@{{ $data | json}}</pre> -->

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Entidad</th>
        <th>Nº DOC</th>
        <th>Nº Resultados</th>
      </tr>
    </thead>
    <tbody>
      <template v-for="co in arConsultas">
        <tr>
          <td>@{{co.FEC_REG}}</td>
          <td>@{{co.FEC_REG}}</td>
          <td>@{{co.DES_ENT}}</td>
          <td>@{{co.NUM_DOCU}}</td>
          <td>@{{co.CANTIDAD}}</td>
        </tr>
      </template>
    </tbody>
  </table>
</div>

@stop
@include('wsusu.vuejs.rowusuario')
@section('carga_footer')
  <script src="{{asset('js/vuejs/vue.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>
  <script src="{{asset('js/vuejs/vue.mod.resultado.js')}}"></script>
  <script src="{{asset('js/plugins/switchery/switchery.js')}}"></script>
  <link href="{{asset('css/plugins/switchery/switchery.css')}}" rel="stylesheet"></link>
@stop