<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Nuevo Rol</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tile">
					<h3 class="tile-title">Ingrese los datos.</h3>
					<div class="tile-body">
					
						<form method="POST" action="" id="formRol" name="formRol" >
							<div class="form-group">
								<label class="control-label">Nombre</label>
								<input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del Rol" required>
							</div>
							<div class="form-group">
								<label class="control-label">Descripcion</label>
								<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripcion del Rol" required></textarea>
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Estado</label>
								<select class="form-control" id="listStatus" name="listStatus" required>
									<option value="Activo">Activo</option>
									<option value="Inactivo">Inactivo</option>
								</select>
							</div>
							<div class="tile-footer">
								<button class="btn btn-primary" type="submit" name="save"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
								&nbsp;&nbsp;&nbsp;
								<button class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>