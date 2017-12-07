<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////

require_once '../model/EstudianteModel.php';
session_start();
$estModel = new EstudianteModel();
$opcion = $_REQUEST['opcion'];
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensaje']);


switch ($opcion) {
    case "listar":
        //obtenemos la lista de productos:
        $listado = $estModel->getEstudiantes();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

    case "crear":
        //navegamos a la pagina de creacion:
        header('Location: ../view/crear.php');
        break;

    case "guardar":
        //obtenemos los valores ingresados por el usuario en el formulario:
        $cedula = $_REQUEST['cedula'];
        $apellidos = $_REQUEST['apellidos'];
        $nombres = $_REQUEST['nombres'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        //creamos un nuevo auto:
        try {
            $estModel->insertarEstudiante($cedula, $apellidos, $nombres, $direccion, $telefono);
        } catch (Exception $e) {
            //colocamos el mensaje de la excepcion en sesion:
            $_SESSION['mensaje'] = $e->getMessage();
        }
        //actualizamos la lista de autos para grabar en sesion:
        $listado = $estModel->getEstudiantes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    case "eliminar":
        //obtenemos la matricula del auto a eliminar:
        $cedula = $_REQUEST['cedula'];
        //eliminamos el producto:
        $estModel->eliminarEstudiante($cedula);
        //actualizamos la lista de autos para grabar en sesion:
        $listado = $estModel->getEstudiantes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

    case "cargar":
        //para permitirle actualizar un estudiante al usuario primero
        //obtenemos los datos completos de ese producto:
        $cedula = $_REQUEST['cedula'];
        $estudiante = $estModel->getEstudiante($cedula);
        //guardamos en sesion el auto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['estudiante'] = $estudiante;
        header('Location: ../view/actualizar.php');
        break;

    case "actualizar":
        //obtenemos los datos modificados por el usuario:
        $cedula = $_REQUEST['cedula'];
        $apellidos = $_REQUEST['apellidos'];
        $nombres = $_REQUEST['nombres'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        //actualizamos los datos del auto:
        $estModel->actualizarEstudiante($cedula, $apellidos, $nombres, $direccion, $telefono);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $estModel->getEstudiantes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../view/index.php');
}
