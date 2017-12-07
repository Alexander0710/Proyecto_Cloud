<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar producto</title>
    </head>
    <body>
        <?php
        include '../model/Estudiante.php';
        //obtenemos los datos de sesion:
        session_start();
        $estudiante = $_SESSION['estudiante'];
        ?>
        <form action="../controller/controller.php">
            <input type="hidden" value="actualizar" name="opcion">
            <!-- Utilizamos pequeños scripts PHP para obtener los valores del producto: -->
            <input type="hidden" value="<?php echo $estudiante->getCedula(); ?>" name="cedula">
            Cedula:<b><?php echo $estudiante->getCedula(); ?></b><br>
            Apellidos:<input type="text" name="apellidos" value="<?php echo $estudiante->getApellidos(); ?>"><br>
            Nombres:<input type="text" name="nombres" value="<?php echo $estudiante->getNombres(); ?>"><br>
            Direccion:<input type="text" name="direccion" value="<?php echo $estudiante->getDireccion(); ?>"><br>
            Telefono:<input type="text" name="telefono" value="<?php echo $estudiante->getTelefono(); ?>"><br>
            <input type="submit" value="Actualizar">
        </form>
    </body>
</html>
