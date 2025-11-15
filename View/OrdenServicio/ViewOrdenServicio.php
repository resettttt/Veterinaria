<?php
class ViewOrdenServicio {
    public static function getRead() {
        ?>
        <div class="container" style="min-height: 70vh; max-width:1200px;">
            <div class="row align-items-center mt-4 mb-2">
                <div class="col-8">
                    <h2 class="mb-0 text-start">Orden de Servicio</h2>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNuevaOrden">
                        Registrar Nueva Orden
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-striped table-bordered align-middle" id="tablaOrdenServicio" style="width:100%;">
                        <thead class="table-light">
                            <tr>
                                <th>No Orden</th>
                                <th>Fecha Orden</th>
                                <th>Veterinario</th>
                                <th>Mascota</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal para registrar nueva orden -->
        <div class="modal fade" id="modalNuevaOrden" tabindex="-1" aria-labelledby="modalNuevaOrdenLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form id="formNuevaOrden">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalNuevaOrdenLabel">Registrar Nueva Orden</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="os_fecha" class="form-label">Fecha Orden</label>
                    <input type="date" class="form-control" id="os_fecha" name="os_fecha" required>
                  </div>
                  <div class="mb-3">
                    <label for="os_vet_id" class="form-label">Veterinario</label>
                    <input type="number" class="form-control" id="os_vet_id" name="os_vet_id" required>
                  </div>
                  <div class="mb-3">
                    <label for="os_mas_id" class="form-label">Mascota</label>
                    <input type="number" class="form-control" id="os_mas_id" name="os_mas_id" required>
                  </div>
                  <div class="mb-3">
                    <label for="os_estado" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="os_estado" name="os_estado" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary" disabled>Registrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <script type="text/javascript" src="../View/OrdenServicio/ordenServicio.js"></script>
        <?php
    }
}
?>
