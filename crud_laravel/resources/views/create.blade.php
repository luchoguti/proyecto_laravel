<form method="post" accept-charset="utf-8" v-on:submit.prevent="createKeep">
	<div class="modal fade" id="create" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Nueva</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<label for="keep">Crear Tarea</label>
					<input type="test" name="keep" class="form-control" v-model="newKeep">
					<span v-for="error in errors" class="text-danger">@{{ error }}</span>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Guardar">
				</div>
			</div>
		</div>
	</div>
</form>