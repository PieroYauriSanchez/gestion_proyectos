<?php 
class UsuarioModel{

    function listar()
    {
        $DB = new Database();
        $DB = $DB->db_connect();
        $query = "SELECT * FROM USUARIOS 
                WHERE ESTADO = 1";
        $result = $DB->prepare($query);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    
    function buscar_usuario($usuario)
    {
        $DB = new Database();
        $DB = $DB->db_connect();
        $query = "SELECT * FROM USUARIOS WHERE ESTADO = 1 AND USUARIO = :USUARIO";
        $result = $DB->prepare($query);
        $result->execute([
            ':USUARIO'=>$usuario
        ]);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } 
}
?>