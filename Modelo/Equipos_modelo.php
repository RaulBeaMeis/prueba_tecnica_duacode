<?php

    class Equipos_modelo{

        private $db;

        private $equipos;

        private $jugadores;

        public function __construct(){
                
            require_once("Conexion.php");

            $this->db=Conexion::conexion();

            $this->equipos=array();

            $this->jugadores=array();


        }

        public function getEquipos() {

            $consulta=$this->db->query("SELECT * FROM equipos");

            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                
                $this->equipos[]=$filas;

            }

            return $this->equipos;

        }

        public function getJugadores($id_equipo) {

            $consulta=$this->db->query("SELECT * FROM jugadores where id_equipo = $id_equipo");

            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                
                $this->jugadores[]=$filas;

            }

            return $this->jugadores;
        }

        public function guardarEquipo($nombre_equipo, $pais_equipo, $ciudad_equipo, $deporte, $fecha_fundacion){

            echo "hola";
            try{
                //$consulta = $this->db->query("INSERT INTO equipo (nombre_equipo, pais_equipo, ciudad_equipo, deporte, fecha_creacion) VALUES ('$nombre_equipo', '$pais_equipo', '$ciudad_equipo', '$deporte', '$fecha_fundacion')");
                $consulta = "INSERT INTO equipos (nombre_equipo, pais_equipo, ciudad_equipo, deporte, fecha_creacion) VALUES (?, ?, ?, ?, ?)";
                $prueba = $this->db->prepare($consulta);
                $prueba->execute([$nombre_equipo, $pais_equipo, $ciudad_equipo, $deporte, $fecha_fundacion]);

                echo "Funciona";
            }catch (PDOException $e) {
                echo "error " . $e->getMessage();
            }
            /* try {
                // Insertar un nuevo equipo en la base de datos
                $consulta = 'INSERT INTO equipo (nombre_equipo, pais_equipo, deporte, fecha_fundacion) VALUES (?, ?, ?, ?)';
                $stmt = $this->db->prepare($consulta);
                $stmt->execute([$datosEquipo['nombre'], $datosEquipo['pais'], $datosEquipo['deporte'], $datosEquipo['fecha']]);
    
                // Devolver el ID del equipo recién insertado
                return $this->db->lastInsertId();
            } catch (PDOException $e) {
                // Manejar errores de la base de datos
                // Puedes registrar los errores o lanzar una excepción personalizada
                return false; // Devolver false en caso de error
            }*/

        }


    }


?>