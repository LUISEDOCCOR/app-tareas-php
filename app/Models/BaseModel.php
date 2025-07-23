<?php
namespace App\Models;

use mysqli;

class BaseModel {
    protected $tabla = "";
    protected $campos = [];
    
    protected static function conectarDB () {
        $conn = new mysqli("localhost", "root", "12345678", "app_tareas");
        return $conn;
    }

    public function obtenerTodos () {
        $conn = self::conectarDB();
        $stmt = $conn->prepare("SELECT * FROM ". $this->tabla);
        $stmt->execute();
        $result= $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerById ($id) {
        $conn = self::conectarDB();
        $stmt = $conn->prepare("SELECT * FROM ".$this->tabla." WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function borrar ($id) { 
        $conn = self::conectarDB();
        $stmt = $conn->prepare("DELETE FROM ".$this->tabla." WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function crear ($valores) { 
        $conn = self::conectarDB();
        
        $camposFormateados = "";
        foreach($this->campos as $campo) {
            $camposFormateados .= $campo . ", ";
        }
        $camposFormateados = rtrim($camposFormateados, ", ");
        $valoresFormateados = str_repeat("?, ", count($valores));
        $valoresFormateados = rtrim($valoresFormateados, ", ");
        
        $stmt = $conn->prepare("INSERT INTO $this->tabla ($camposFormateados) VALUES ($valoresFormateados)");
        $stmt->bind_param(str_repeat("s", count($valores)), ...$valores);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function update($id, $datos)
    {
        $conn = self::conectarDB();

        $campos = "";
        $valores = [];
        foreach ($datos as $key => $value) {
            $campos .= "$key = ?, ";
            $valores[] = $value;
        }
        $campos = rtrim($campos, ", ");

        $stmt = $conn->prepare("UPDATE $this->tabla SET $campos WHERE id = ?");

        $tipos = str_repeat("s", count($valores)) . "i";
        $valores[] = $id;

        $stmt->bind_param($tipos, ...$valores);
        return $stmt->execute();
    }
}