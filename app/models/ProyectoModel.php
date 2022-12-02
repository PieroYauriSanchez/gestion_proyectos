<?php

class ProyectoModel
{
    function listar()
    {
        $DB = new Database();
        $DB = $DB->db_connect();
        $query = "	SELECT P.COD_PROYECTO, P.NOMBRE_PROYECTO, E.DESCRIPCION AS EQUIPO_DESARROLLO,
                    C.RAZON_SOCIAL, P.DESCRIPCION, P.COD_EQUIPO, P.COD_CLIENTE
                    FROM PROYECTO P
                    INNER JOIN CLIENTE C ON P.COD_CLIENTE = C.COD_CLIENTE
                    INNER JOIN EQUIPO_DESARROLLO E ON P.COD_EQUIPO = E.COD_EQUIPO 
                    WHERE P.ESTADO <> 0";
        $result = $DB->prepare($query);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } 

    function crear($data)
    {
        try {
            $DB = new Database();
            $DB = $DB->db_connect();
            $query = "INSERT INTO PROYECTO 
                        (COD_CLIENTE,COD_EQUIPO,NOMBRE_PROYECTO,DESCRIPCION,ESTADO)
                    VALUES
                        (:COD_CLIENTE,:COD_EQUIPO,:NOMBRE_PROYECTO,:DESCRIPCION,:ESTADO)";
            $result = $DB->prepare($query);
            $result->execute([
                ':COD_CLIENTE'=> $data['COD_CLIENTE'],
                ':COD_EQUIPO' => $data['COD_EQUIPO'],                 
                ':NOMBRE_PROYECTO' => $data['NOMBRE_PROYECTO'],
                ':DESCRIPCION' => $data['DESCRIPCION'],
                ':ESTADO' => '1'
            ]);
            return true;            
        } catch (Exception $e) {
            // show($e->getMessage());
            // die();
            //throw new Exception($e->getMessage());
            return false;
        }
    }

    function listar_cliente()
    {
        $DB = new Database();
        $DB = $DB->db_connect();
        $query = "SELECT * FROM CLIENTE";
        $result = $DB->prepare($query);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } 

    function listar_equipo()
    {
        $DB = new Database();
        $DB = $DB->db_connect();
        $query = "SELECT * FROM EQUIPO_DESARROLLO";
        $result = $DB->prepare($query);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } 
    function editar_proyecto($data)
    {
        try {
            $DB = new Database();
            $DB = $DB->db_connect();
            $query = "UPDATE PROYECTO
                SET COD_CLIENTE = :COD_CLIENTE, 
                    COD_EQUIPO =:COD_EQUIPO, 
                    NOMBRE_PROYECTO =:NOMBRE_PROYECTO,
                    DESCRIPCION = :DESCRIPCION
                WHERE COD_PROYECTO = :COD_PROYECTO";
            $result = $DB->prepare($query);
            $result->execute([
                ':COD_PROYECTO'=>$data['COD_PROYECTO'],
                ':COD_CLIENTE'=> $data['COD_CLIENTE'],
                ':COD_EQUIPO' => $data['COD_EQUIPO'],                 
                ':NOMBRE_PROYECTO' => $data['NOMBRE_PROYECTO'],
                ':DESCRIPCION' => $data['DESCRIPCION'],
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function agregar_actividad($data)
    {
        try {
            $DB = new Database();
            $DB = $DB->db_connect();
            $query = "INSERT INTO CRONOGRAMA 
                        (COD_PROYECTO,DESC_ACTIVIDAD,FECHA_INICIO,FECHA_TERMINO, AVANCE, ESTADO)
                       VALUES
                       (:COD_PROYECTO,:DESC_ACTIVIDAD,:FECHA_INICIO,:FECHA_TERMINO,:AVANCE,:ESTADO)";
             $result = $DB->prepare($query);
             $result->execute([
                ':COD_PROYECTO'=>$data['COD_PROYECTO'],
                ':DESC_ACTIVIDAD'=>$data['DESC_ACTIVIDAD'],
                ':FECHA_INICIO'=> $data['FECHA_INICIO'],
                ':FECHA_TERMINO'=> $data['FECHA_TERMINO'],
                ':AVANCE'=> 0,
                ':ESTADO'=> 1,
             ]);
             return true;
         } catch (Exception $e) {
             return false;
         }
    }

    function eliminar_proyecto($id)
    {
        try {
            $DB = new Database();
            $DB = $DB->db_connect();
            $query = "UPDATE PROYECTO
                      SET ESTADO = :ESTADO
                      WHERE COD_PROYECTO = :COD_PROYECTO";
            $result = $DB->prepare($query);
            $result->execute([
                        ':COD_PROYECTO'=>$id,
                        ':ESTADO'=> 0
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function eliminar_actividad($id)
    {
        try {
            $DB = new Database();
            $DB = $DB->db_connect();
            $query = "UPDATE CRONOGRAMA
                      SET ESTADO = :ESTADO
                      WHERE COD_ACTIVIDAD = :COD_ACTIVIDAD";
             $result = $DB->prepare($query);
             $result->execute([
                         ':COD_ACTIVIDAD'=>$id,
                         ':ESTADO'=> 0
             ]);
             return true;
         } catch (Exception $e) {
             return false;
        }
    }

    function detalle_proyecto($id)
    {
        $DB = new Database();
        $DB = $DB->db_connect();
        $query = "	SELECT P.COD_PROYECTO, NOMBRE_PROYECTO, P.DESCRIPCION, C.CORREO_ELECTRONICO, C.REPRESENTANTE_LG
                    FROM PROYECTO P
                    INNER JOIN CLIENTE C ON P.COD_CLIENTE = C.COD_CLIENTE
                    INNER JOIN EQUIPO_DESARROLLO E ON P.COD_EQUIPO = E.COD_EQUIPO
                    WHERE P.COD_PROYECTO = :COD_PROYECTO";
        $result = $DB->prepare($query);
        $result->execute([':COD_PROYECTO' => (int) $id]);
        $object = new ArrayObject();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        if (count($data) == 1) {
            $object = $data[0]; //obtenemos el 1ero             
        }
        return $object;
    }

}

?>