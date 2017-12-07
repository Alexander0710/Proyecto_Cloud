<?php

include_once 'Database.php';
include_once 'Estudiante.php';

/**
 * Description of EstudianteModel
 *
 * @author Gaby
 */
class EstudianteModel {

    /**
     * Retorna la lista de estudiantes de la bdd.
     * @return array
     */
    public function getEstudiantes() {
//obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from estudiantes order by cedula desc";
        $resultado = $pdo->query($sql);
//transformamos los registros en objetos de tipo Factura:
        $listado = array();
        foreach ($resultado as $res) {
            $estudiante = new Estudiante($res['cedula'], $res['apellidos'], $res['nombres'], $res['direccion'], $res['telefono']);
            array_push($listado, $estudiante);
        }
        Database::disconnect();
//retornamos el listado resultante:
        return $listado;
    }

    /**
     * Inserta una nueva studiante en la bdd.

     * @throws Exception
     */
    public function insertarEstudiante($cedula, $apellidos, $nombres, $direccion, $telefono) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into estudiantes(cedula,apellidos,nombres,direccion,telefono) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
//Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($cedula, $apellidos, $nombres, $direccion, $telefono));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarEstudiante($cedula) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from estudiantes where cedula=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($cedula));
        Database::disconnect();
    }

    public function getEstudiante($cedula) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from estudiantes where cedula=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedula));
        //obtenemos la factura especifica:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $estudiante = new Estudiante($res['cedula'], $res['apellidos'], $res['nombres'], $res['direccion'], $res['telefono']);
        Database::disconnect();
        //retornamos la factura encontrada:
        return $estudiante;
    }

    /**
     * Metodo que permite actualizar la informacion de una estudiante especifica.
     * @throws Exception
     */
    public function actualizarEstudiante($cedula, $apellidos, $nombres, $direccion, $telefono) {
        $pdo = Database::connect();
        $sql = "update estudiantes set apellidos=?,nombres=?,direccion=?,telefono=? where cedula=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($apellidos, $nombres, $direccion, $telefono, $cedula));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
