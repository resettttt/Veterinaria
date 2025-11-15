<?php
include_once __DIR__ . '/../../DAO/OrdenServicioDAO.php';

class CtrlOrdenServicio extends OrdenServicioDAO {
    public function read() {
    include_once __DIR__ . '/../../View/OrdenServicio/ModalsOrdenServicio.php';
    include_once __DIR__ . '/../../View/OrdenServicio/ViewOrdenServicio.php';
        ViewOrdenServicio::getRead();
    }

    public function data(){
        $listOrdenServicio = $this->getAll();
        $array = [];
        $array['data'] = []; // <-- Asegura que 'data' es un array
        foreach($listOrdenServicio as $key => $row){
            $array['data'][$key]['noOrden'] = $row['os_id'];
            $array['data'][$key]['fechaOrden'] = $row['os_fecha'];
            $array['data'][$key]['Veterinario'] = $row['vet_veterinaria'];
            $array['data'][$key]['Mascota'] = $row['mas_nombre'];
            $array['data'][$key]['Estado'] = $row['os_estado'];
            $array['data'][$key]['buttons'] = '<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarOrden" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-edit fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarOrden">
                        <li><a class="dropdown-item btnShowEdit" href="#!" data-bs-toggle="modal" data-bs-target="#modalEditOrden" data-url="'.getUrl('OrdenServicio', 'OrdenServicio', 'getData', array('id' => $row['os_id']), 'ajax').'" role="button">Editar</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Eliminar</a></li>
                    </ul>
                </li>
            </ul>';
        }
        echo json_encode($array);
    }
}
