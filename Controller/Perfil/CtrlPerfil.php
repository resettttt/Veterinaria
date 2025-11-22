<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CtrlPerfil
 *
 * @author estudiante
 */
include_once '../DAO/PerfilDAO.php';

class CtrlPerfil extends PerfilDAO
{
    public function read()
    {
        include_once '../View/Perfil/ViewPerfil.php';
        include_once '../View/Perfil/ModalsPerfil.php';
        ViewPerfil::getread();
    }

    public function data()
    {
        $listPerfil = PerfilDAO::getAll();
        $array = [];

        foreach ($listPerfil as $key => $rowPerfil) {
            $array['data'][$key]['id'] = $rowPerfil['per_id'];
            $array['data'][$key]['description'] = $rowPerfil['per_descripcion'];
            $array['data'][$key]['status'] = $rowPerfil['per_estado'];
            $array['data'][$key]['buttons'] = '<div class="btn-group">
                <a class="btn btn-sm btn-primary btnShowEdit" href="#!" data-bs-toggle="modal" data-bs-target="#modalEditPerfil" data-url="' . getUrl('Perfil', 'Perfil', 'getData', array('idPerfil' => $rowPerfil['per_id']), 'ajax') . '">Editar</a>
            </div>';
        }

        echo json_encode($array);
    }

    public function postNew()
    {
        // coincidir con name del modal: descripcionPerfil
        $descripcion = isset($_POST['descripcionPerfil']) ? $_POST['descripcionPerfil'] : '';
        $rs = PerfilDAO::getInstance()->add($descripcion);
        if ($rs == 1) {
            messageSweetAlert("¡Éxito!", "Perfil creado correctamente.", "success", "#4CAF50", getUrl('Perfil', 'Perfil', 'read'));
        } else {
            messageSweetAlert("Advertencia!", "No fue posible crear el perfil", "warning", "#f7060d", getUrl('Perfil', 'Perfil', 'read'));
        }
    }

    public function getData()
    {
        $id = isset($_GET['idPerfil']) ? $_GET['idPerfil'] : 0;
        $array = [];
        $rs = PerfilDAO::getInstance()->findById($id);
        foreach ($rs as $key => $rowPerfil) {
            $array['id'] = $rowPerfil['per_id'];
            $array['description'] = $rowPerfil['per_descripcion'];
        }
        echo json_encode($array);
    }

    public function postUpdate()
    {
        // coincidir con name del modal: idPerfilEdit / descripcionPerfilEdit
        $id = isset($_POST['idPerfilEdit']) ? $_POST['idPerfilEdit'] : 0;
        $descripcion = isset($_POST['descripcionPerfilEdit']) ? $_POST['descripcionPerfilEdit'] : '';
        $rs = PerfilDAO::getInstance()->update($id, $descripcion);
        if ($rs == 1) {
            messageSweetAlert("¡Éxito!", "Perfil actualizado correctamente.", "success", "#4CAF50", getUrl('Perfil', 'Perfil', 'read'));
        } else {
            messageSweetAlert("Advertencia!", "No fue posible actualizar el perfil", "warning", "#f7060d", getUrl('Perfil', 'Perfil', 'read'));
        }
    }
}
?>

