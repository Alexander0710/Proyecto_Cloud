<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD Estudiantes</title>
    </head>
    <body>
        <table>
            <tr><td>
                    <form action="../controller/controller.php">
                        <input type="hidden" value="listar" name="opcion">
                        <input type="submit" value="Consultar listado">
                    </form>
                </td>
                <td>
                    <form action="../controller/controller.php">
                        <input type="hidden" value="crear" name="opcion">
                        <input type="submit" value="Nuevo estudiante">
                    </form>
                </td></tr>
        </table>
        <table border="1">
            <tr>
                <th>CEDULA</th>
                <th>APELLIDOS</th>
                <th>NOMBRES</th>
                <th>DIRECCION</th>
                <th>TELEFONO</th>
                <th>ELIMINAR</th>
                <th>ACTUALIZAR</th>
            </tr>
            <?php
            session_start();
            include '../model/Estudiante.php';
            //verificamos si existe en sesion el listado de productos:
            if (isset($_SESSION['listado'])) {
                $listado = unserialize($_SESSION['listado']);
                foreach ($listado as $prod) {
                    echo "<tr>";
                    echo "<td>" . $prod->getCedula() . "</td>";
                    echo "<td>" . $prod->getApellidos() . "</td>";
                    echo "<td>" . $prod->getNombres() . "</td>";
                    echo "<td>" . $prod->getDireccion() . "</td>";
                    echo "<td>" . $prod->getTelefono() . "</td>";
                    //opciones para invocar al controlador indicando la opcion eliminar o cargar
                    //y la fila que selecciono el usuario (con la matricula del auto):
                    echo "<td><a href='../controller/controller.php?opcion=eliminar&cedula=" . $prod->getCedula() . "'>eliminar</a></td>";
                    echo "<td><a href='../controller/controller.php?opcion=cargar&cedula=" . $prod->getCedula() . "'>actualizar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "No se han cargado datos.";
            }
            ?>
        </table>
    </body>
</html>
