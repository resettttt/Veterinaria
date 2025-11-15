<?php
include_once __DIR__ . '/../../View/OrdenServicio/ModalsOrdenServicio.php';
include_once __DIR__ . '/../../View/OrdenServicio/ViewOrdenServicio.php';
?>
<!-- Modal de ejemplo para editar Orden de Servicio -->
<div class="modal fade" id="modalEditOrden" tabindex="-1" role="dialog" aria-labelledby="modalEditOrdenLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditOrdenLabel">Editar Orden de Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Aquí van los campos del formulario de edición -->
        <form id="formEditOrden">
          <div class="form-group">
            <label for="os_estado">Estado</label>
            <input type="text" class="form-control" id="os_estado" name="os_estado">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>
