<?php
    include_once "class/ldap.php";
    $_POST = json_decode(file_get_contents("php://input"),true);


    if(isset($_GET['tipo']) && $_GET['tipo'] == 'buscarIndicador') {

        try {
            
            $indicador = $_GET['indicador'];

            $ldap = new Ldap($indicador);

            $datos = $ldap->buscarIndicador();

            if(count($datos) > 0) {
                $respuesta = array(
                    "tipo" => "success",
                    "data" => $datos,
                    "mensaje" => 'Usuario encontrado'
                );
            } else {
                $respuesta = array(
                    "tipo" => "warning",
                    "data" => $datos,
                    "mensaje" => 'Usuario no encontrado'
                );
            }
        } catch (Exception $e) {
            $respuesta = array(
                "tipo" => "error",
                "data" => $e->getMessage()
            );
        }

        die(json_encode($respuesta));

    }

    if(isset($_GET['tipo']) && $_GET['tipo'] == 'buscarCedula') {

        try {
            
            $cedula = $_GET['cedula'];

            $ldap = new Ldap($cedula);

            $datos = $ldap->buscarCedula();

            if(count($datos) > 0) {
                $respuesta = array(
                    "tipo" => "success",
                    "data" => $datos,
                    "mensaje" => 'Usuario encontrado'
                );
            } else {
                $respuesta = array(
                    "tipo" => "warning",
                    "data" => $datos,
                    "mensaje" => 'Usuario no encontrado'
                );
            }
        } catch (Exception $e) {
            $respuesta = array(
                "tipo" => "error",
                "data" => $e->getMessage()
            );
        }

        die(json_encode($respuesta));

    }




?>