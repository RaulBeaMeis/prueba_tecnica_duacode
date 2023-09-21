<?php

    class EquiposModel{

        private $db;

        private $equipos;

        public function __construct(){
                
            require_once("Conexion.php");

            $this->db=Conexion::conexion();

            $this->equipos=array();


        }

        public function getEquipos() {

            $consulta=$this->db->query("SELECT * FROM equipos");

            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                
                $this->equipos[]=$filas;

            }

            return $this->equipos;

        }

        public function guardarEquipo($nombre_equipo, $pais_equipo, $ciudad_equipo, $deporte, $fecha_fundacion){

            try{
                //$consulta = $this->db->query("INSERT INTO equipo (nombre_equipo, pais_equipo, ciudad_equipo, deporte, fecha_creacion) VALUES ('$nombre_equipo', '$pais_equipo', '$ciudad_equipo', '$deporte', '$fecha_fundacion')");
                $consulta = "INSERT INTO equipos (nombre_equipo, pais_equipo, ciudad_equipo, deporte, fecha_creacion) VALUES (?, ?, ?, ?, ?)";
                $prueba = $this->db->prepare($consulta);
                $prueba->execute([$nombre_equipo, $pais_equipo, $ciudad_equipo, $deporte, $fecha_fundacion]);

                echo "Funciona";
            }catch (PDOException $e) {
                echo "error " . $e->getMessage();
            }

        }

        public function actualizarCapitanEquipo($id_equipo, $nom_jugador){
            try{
                $sqlActualizacion = "UPDATE equipos SET nom_capitan = ? WHERE id_equipo = ?";
                $actualizacion = $this->db->prepare($sqlActualizacion);
                $actualizacion->execute([$nom_jugador, $id_equipo]);
            }catch (PDOException $e) {
                echo "error " . $e->getMessage();
            }
        }

        public function actualizarCapitanEquipoEliminado($id_equipo){
            try{
                $sqlActualizacion = "UPDATE equipos SET nom_capitan = '' WHERE id_equipo = ?";
                $actualizacion = $this->db->prepare($sqlActualizacion);
                $actualizacion->execute([$id_equipo]);
            }catch (PDOException $e) {
                echo "error " . $e->getMessage();
            }
        }


    }


?>