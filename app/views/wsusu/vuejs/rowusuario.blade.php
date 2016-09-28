<script type="text/template" id="rowUsuario">
	<tr>
		<td>@{{entidad}}</td>
		<td>@{{acceso}}</td>
		<td>@{{ip}}</td>
		<td>@{{limitconsulta}}</td>
		<td>@{{getNivelDescrip()}}</td>
		<td>@{{fechaconvenio}}</td>
        <td><input type="checkbox" class="check-switchery" v-bind:="{'checked': estado == '1'}"></td>
		<td>
			<a href="#" class="btn btn-success">
				<i data-toggle="tooltip" data-placement="top" title="Descargar Contrato" class="fa fa-download" aria-hidden="true"></i>
			</a>
			<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalUsuario" @click="edit($event)">
				<i data-toggle="tooltip" data-placement="top" title="Editar" class="fa fa-edit" aria-hidden="true"></i>
			</a>				
		</td>
	</tr>
</script>