<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear producto</title>
    </head>
    <body>
        <form action="../controller/controller.php">
            <input type="hidden" value="guardar" name="opcion">
            Cedula:<input type="text" name="cedula"><br>
            Apellidos:<input type="text" name="apellidos"><br>
            Nombres:<input type="text" name="nombres"><br>
            Direccion:<input type="text" name="direccion"><br>
            Telefono:<input type="text" name="telefono"><br>
            <input type="submit" value="Crear">
        </form>
    </body>
</html>

