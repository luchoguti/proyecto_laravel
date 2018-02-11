<form method="post" accept-charset="utf-8" v-on:submit.prevent="UpdateKeep(fillKeep.id)">
	<div class="modal fade" id="edit" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<label for="keep">Actualizar Tarea</label>
					<input type="test" name="keep" class="form-control" v-model="fillKeep.keep">
					<span v-for="error in errors" class="text-danger">@{{ error }}</span>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-warning" value="Actualizar">
				</div>
			</div>
		</div>
	</div>
</form>