<?php

require_once 'model.php';
class AutosModel extends Model
{

    // Devuelve los autos de una Marca 
    public function getAutosByMarcas($id)
    {
        // Crea la consulta para obtener una categoria
        $sentencia = $this->db->prepare("SELECT * FROM autos
        WHERE id_marca_fk = ?"); // Prepara 
        $sentencia->execute([$id]); // Ejecuta
        $auto = $sentencia->fetchAll(PDO::FETCH_OBJ); // Obtiene la respuesta
        return $auto;
    }

    public function getAll(){

        // Crea la consulta para obtener todos los elementos
        $sentencia = $this->db->prepare("SELECT * FROM autos"); // Prepara
        $sentencia->execute(); // Ejecuta
        $autos = $sentencia->fetchAll(PDO::FETCH_OBJ); // Obtiene la respuesta
        return $autos;
    }

    public function auto($id){

        // Crea la consulta para obtener el Auto
        $sentencia = $this->db->prepare("SELECT * FROM autos JOIN marcas ON autos.id_marca_fk = marcas.id_marca WHERE autos.id_auto = ?"); // Prepara
        $sentencia->execute([$id]); // Ejecuta
        $auto = $sentencia->fetch(PDO::FETCH_OBJ); // Obtiene la respuesta
        return $auto;
    }
    public function addAuto($nombre_auto,$descripcion_auto,$precio_auto,$id_marca){

        $sentencia = $this->db->prepare("INSERT INTO autos(nombre_auto, descripcion, precio, id_marca_fk) VALUES(?,?,?,?)"); // Prepara         
        return $sentencia->execute([$nombre_auto,$descripcion_auto,$precio_auto,$id_marca]); // Ejecuta
    }
    public function editAuto($nombre_auto,$descripcion_auto,$precio_auto,$id_marca,$id_auto){

        $sentencia = $this->db->prepare("UPDATE autos SET nombre_auto =?, descripcion=?, precio=?, id_marca_fk=? WHERE id_auto = ?"); // Prepara        
        return $sentencia->execute([$nombre_auto,$descripcion_auto,$precio_auto,$id_marca, $id_auto]); // Ejecuta
    }
    public function delete($id_auto)
    {
        $sentencia = $this->db->prepare("DELETE FROM autos  WHERE id_auto = ?"); // Prepara
        $sentencia->execute([$id_auto]); // Ejecuta 
        return $sentencia;
    }
}
