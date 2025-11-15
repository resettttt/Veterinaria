<?php


class ViewResultadoOrden {

    public static function getRead() {
        ?>
        <div class="container">
            <h2>Resultado de Orden</h2>

            <div class="section info">
              <table class="table table-striped table-bordered" id="tablaResultadoOrden">
                    <thead>
                        <tr>
                            <th>No Orden</th>
                            <th>Fecha Orden</th>
                            <th>Veterinario</th>
                            <th>Mascota</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                     
              </table>
            </div>
           
        </div>
        <script type="text/javascript" src="../View/ResultadoOrden/ordenServicio.js"></script>
        <?php
    }
}
