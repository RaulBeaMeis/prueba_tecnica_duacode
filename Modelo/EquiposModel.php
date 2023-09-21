<?php

    class EquiposModel{

        private $db;

        private $equipos;

        public function __construct(){
                
            require_once("Conexion.php");

            $this->db=Conexion::conexion();

            $this->equipos=array();


        }

        //Función que obtiene todos los equipos de la base de datos
        public function getEquipos() {

            $consulta=$this->db->query("SELECT * FROM equipos");

            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                
                $this->equipos[]=$filas;

            }

            return $this->equipos;

        }

        //Función que agrega en la base de datos un equipo completamente nuevo
        public function guardarEquipo($nombre_equipo, $pais_equipo, $ciudad_equipo, $deporte, $fecha_fundacion){

            try{
                $consulta = "INSERT INTO equipos (nombre_equipo, pais_equipo, ciudad_equipo, deporte, fecha_creacion) VALUES (?, ?, ?, ?, ?)";
                $prueba = $this->db->prepare($consulta);
                $prueba->execute([$nombre_equipo, $pais_equipo, $ciudad_equipo, $deporte, $fecha_fundacion]);

                echo "Funciona";
            }catch (PDOException $e) {
                echo "error " . $e->getMessage();
            }

        }

        //Función que actualiza quien es el capitan en el listado de equipos
        public function actualizarCapitanEquipo($id_equipo, $nom_jugador){
            try{
                $sqlActualizacion = "UPDATE equipos SET nom_capitan = ? WHERE id_equipo = ?";
                $actualizacion = $this->db->prepare($sqlActualizacion);
                $actualizacion->execute([$nom_jugador, $id_equipo]);
            }catch (PDOException $e) {
                echo "error " . $e->getMessage();
            }
        } 

        //Función actualiza el capitán en el listado de equipos si este es eliminado
        public function actualizarCapitanEquipoEliminado($id_equipo, $id_jugador){
            $consulta=$this->db->query("SELECT capitan FROM jugadores where id_jugador = $id_jugador");
            
            if ($consulta){
                $filas=$consulta->fetch(PDO::FETCH_ASSOC);
                echo $filas;
                if($filas){
                    $valor = $filas['capitan'];
                    if ($valor == 1){
                        try{
                            $sqlActualizacion = "UPDATE equipos SET nom_capitan = '' WHERE id_equipo = ?";
                            $actualizacion = $this->db->prepare($sqlActualizacion);
                            $actualizacion->execute([$id_equipo]);
                        }catch (PDOException $e) {
                            echo "error " . $e->getMessage();
                        }
                    }
                } else {
                    echo "fallo";
                }
            }
        }


    }


?>