<?php
include_once '../DAO/ResultadoOrdenDAO.php';

class CtrlResultadoOrden extends ResultadoOrdenDAO {

    public function read() {
        include_once '../View/Resultadoorden/ModalsResultadoOrden.php';
        include_once '../View/Resultadoorden/ViewResultadoOrden.php';      
        ViewResultadoOrden::getRead();
    }

    public function data(){
        $listResultOS=[];
        $array=[]; 
        $listResultOS=$this->getAll();
        foreach($listResultOS as $key => $rowResultOS){          
           
            $array['data'][$key]['noOrden'] = $rowResultOS['os_id'];          
            $array['data'][$key]['fechaOrden'] = $rowResultOS['os_fecha'];      
            $array['data'][$key]['Veterinario'] = $rowResultOS['vet_veterinaria'];        
            $array['data'][$key]['Mascota'] = $rowResultOS['mas_nombre'];
            $array['data'][$key]['buttons']  = '<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDepto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-edit fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDepto">
                        <li><a class="dropdown-item btnShowEdit" href="#!" data-bs-toggle="modal" data-bs-target="#modalEditDepto" data-url="'.getUrl('ResultadoOrden', 'ResultadoOrden', 'getData', array('id' => $rowResultOS['os_id']), 'ajax').'" role="button">Editar</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Eliminar</a></li>                                              
                    </ul>
                </li>
            </ul>';                  
        };
       
        /*
            json_encode($array) => se convierte el arreglo a formato JSON para la libreria data table
        */
        echo json_encode($array);
    }
}


