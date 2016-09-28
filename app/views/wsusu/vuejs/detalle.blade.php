@extends('wsusu.master-layout')
@section('contenido_principal')

<br>  </br>


<!--<div class="container-fluid">-->

<center>
  <h3>DETALLE DE CONSULTAS</h3>
</center>

<form class="form-group">
  <div class="row">
    <div class="col-md-4">
        <label>Fecha:</label>
        <input type="text" name="des_log" class="form-control">
    </div>
    <div class="col-md-4">
        <label>Hora:</label>
        <input type="text" name="des_log" class="form-control">
    </div>    
    <div class="col-md-4">
      <div class="">
          <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> BUSCAR</button>
      </div>
    </div> 
  </div>

  <div class="row">
    <div class="col-md-8">
        <label class="" >Entidad:</label>
        <input type="text" name="des_ent" class="form-control">
    </div>
    
    <div class="col-md-4">
      <div class="">
          <button type="button" class="btn btn-warning"><i class="glyphicon glyphicon-search" ></i> EXPORTAR</button>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
        <label class="" >N° Documento:</label>
        <input type="text" name="des_ent" class="form-control">
    </div>
    
  </div>
</form>

<div class="fluid-container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Entidad</th>
        <th>Nro Documento</th>
        <th>Resultados</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr >
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>

@stop
@section('carga_footer')

@stop