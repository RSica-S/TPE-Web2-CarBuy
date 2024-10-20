<?php

require_once 'model.php';
class LoginModel extends Model{
    
    public function getUser($nombre_usuario)
    {
        // Crea la consulta para obtener una categoria
        $sentencia = $this->db->prepare("SELECT * FROM usuario
        WHERE nombre_usuario = ?"); // Prepara
        $sentencia->execute([$nombre_usuario]); // Ejecuta
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ); // Obtiene la respuesta
        return $usuario;
    }
}