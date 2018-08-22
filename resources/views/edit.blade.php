
<!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Task @{{ llenarKeep.keep }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<label for="keep"> Editar Keeps </label>
				<input type="text" name="keep" class="form-control" v-model="llenarKeep.keep">
				<span v-for="error in errors"> @{{ error }} </span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" v-on:click.prevent='updateKeeps(llenarKeep.id)'>Actualizar Keep</button>
			</div>
		</div>
	</div>
</div>