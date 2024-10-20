<?php

require_once 'model.php';
class MarcasModel extends Model
{
    // Devuelve todas las Marcas
    public function getAll()
    {
        // Crea la consulta para obtener una categoria
        $sentencia = $this->db->prepare("SELECT * FROM marcas"); // Prepara
        $sentencia->execute(); // Ejecuta
        $marca = $sentencia->fetchAll(PDO::FETCH_OBJ); // Obtiene la respuesta
        return $marca;
    }

    // Devuelve la Marca
    public function get($id_marca)
    {
        // Crea la consulta para obtener una categoria
        $sentencia = $this->db->prepare("SELECT * FROM marcas  WHERE id_marca=?"); // Prepara
        $sentencia->execute([$id_marca]); // Ejecuta
        $marca = $sentencia->fetch(PDO::FETCH_OBJ); // Obtiene la respuesta
        return $marca;
    }

    public function getName($nombre)
    {
        // Devuelve el nombre
        $sentencia = $this->db->prepare("SELECT * FROM marcas WHERE nombre_marca=?"); // Prepara 
        $sentencia->execute([$nombre]); // Ejecuta
        $marca = $sentencia->fetch(PDO::FETCH_OBJ); // Obtiene la respuesta
        return $marca;
    }

    public function insert($nombre)
    {
        $sentencia = $this->db->prepare("INSERT INTO marcas(nombre_marca) VALUES(?)"); // Prepara        
        return $sentencia->execute([$nombre]); // Ejecuta
    }

    public function update($nombre, $id)
    {
        $sentencia = $this->db->prepare("UPDATE marcas SET nombre_marca=? WHERE id_marca=?"); // Prepara
        return $sentencia->execute([$nombre, $id]); // Ejecuta
    }

    public function delete($id_marca)
    {
        $sentencia = $this->db->prepare("DELETE FROM marcas  WHERE id_marca = ?"); // Prepara
        $sentencia->execute([$id_marca]); // Ejecuta 
        return $sentencia;
    }
}
