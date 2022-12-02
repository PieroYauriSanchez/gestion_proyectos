<?php

class CronogramaModel
{
    function crear($data)
    {
        try {
            $DB = new Database();
            $DB = $DB->db_connect();
            $query = "INSERT INTO cronograma VALUES ( 
                    NULL, :id_servidor, :actividad, :producto, :tiempo_estimado, :fecha_presentacion,
                    :estado, NULL, NULL)";
            $result = $DB->prepare($query);
            $result->execute(
                [
                    ':id_servidor' => $data['id_usuario'],                    
                    ':actividad' => $data['actividad'],
                    ':producto' => $data['producto'],
                    ':tiempo_estimado' => $data['tiempo_estimado'],
                    ':fecha_presentacion' => $data['fecha_presentacion'],
                    ':estado' => '1'
                ]
            );
            return true;            
        } catch (Exception $e) {
            //  show($e->getMessage());
            //throw new Exception($e->getMessage());
            return false;
        }
    }

    function listar($id)
    {
        $DB = new Database();
        $DB = $DB->db_connect();
        $query = "SELECT * FROM CRONOGRAMA WHERE COD_PROYECTO = :COD_PROYECTO
                    AND ESTADO <> 0";
        $result = $DB->prepare($query);
        $result->execute([':COD_PROYECTO'=>$id]);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function editar_actividad($data)
    {
        // show($data);
        // die();
        try {
            $DB = new Database();
            $DB = $DB->db_connect();
            $query = "UPDATE CRONOGRAMA
                SET DESC_ACTIVIDAD = :DESC_ACTIVIDAD,
                    FECHA_INICIO = :FECHA_INICIO,
                    FECHA_TERMINO = :FECHA_TERMINO
                WHERE COD_ACTIVIDAD = :COD_ACTIVIDAD";
            $result = $DB->prepare($query);
            $result->execute([
                ':COD_ACTIVIDAD'=>$data['COD_ACTIVIDAD'],
                ':FECHA_INICIO'=> $data['FECHA_INICIO'],
                ':FECHA_TERMINO' => $data['FECHA_TERMINO'],                 
                ':DESC_ACTIVIDAD' => $data['DESC_ACTIVIDAD']
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
