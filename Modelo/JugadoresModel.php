<?php

    class JugadoresModel{

        private $db;

        private $jugadores;

        public function __construct(){
                
            require_once("Conexion.php");

            $this->db=Conexion::conexion();

            $this->jugadores=array();


        }

        public function getJugadores($id_equipo) {

            $consulta=$this->db->query("SELECT * FROM jugadores where id_equipo = $id_equipo");
    
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                
                $this->jugadores[]=$filas;
    
            }
    
            return $this->jugadores;
        }

        public function guardarNuevoJugador($nombre_jugador, $num_jugador, $fech_nac, $capitan, $id_equipo){
            try{
                //$consulta = $this->db->query("INSERT INTO equipo (nombre_equipo, pais_equipo, ciudad_equipo, deporte, fecha_creacion) VALUES ('$nombre_equipo', '$pais_equipo', '$ciudad_equipo', '$deporte', '$fecha_fundacion')");
                $consulta = "INSERT INTO jugadores (nombre_jugador, num_jugador, fech_nac, capitan, id_equipo) VALUES (?, ?, ?, ?, ?)";
                $prueba = $this->db->prepare($consulta);
                $prueba->execute([$nombre_jugador, $num_jugador, $fech_nac, $capitan, $id_equipo]);

                echo "Funciona";
            }catch (PDOException $e) {
                echo "error " . $e->getMessage();
            }
        }

        public function eliminarJugadores($id_jugador){
            try{
                //$consulta = $this->db->query("INSERT INTO equipo (nombre_equipo, pais_equipo, ciudad_equipo, deporte, fecha_creacion) VALUES ('$nombre_equipo', '$pais_equipo', '$ciudad_equipo', '$deporte', '$fecha_fundacion')");
                $consulta = "DELETE FROM jugadores WHERE id_jugador = $id_jugador";
                $prueba = $this->db->prepare($consulta);
                $prueba->execute();

                echo "Funciona";
            }catch (PDOException $e) {
                echo "error " . $e->getMessage();
            }
        }

        public function getJugadoresToEdit($id_jugador){
            $consulta=$this->db->query("SELECT * FROM jugadores where id_jugador = $id_jugador");
    
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                
                $this->jugadores[]=$filas;
    
            }
    
            return $this->jugadores;

        }

        public function guardarJugadorModificado($id_jugador, $nombre_jugador, $num_jugador, $fech_nac, $capitan){
            try{
                
                //$consulta = $this->db->query("INSERT INTO equipo (nombre_equipo, pais_equipo, ciudad_equipo, deporte, fecha_creacion) VALUES ('$nombre_equipo', '$pais_equipo', '$ciudad_equipo', '$deporte', '$fecha_fundacion')");
                $consulta = "UPDATE jugadores SET nombre_jugador = ?, num_jugador = ?, fech_nac = ?, capitan = ? WHERE id_jugador = ?";
                $prueba = $this->db->prepare($consulta);
                $prueba->execute([$nombre_jugador, $num_jugador, $fech_nac, $capitan, $id_jugador]);
                echo $id_jugador;
                echo "Funciona";
            }catch (PDOException $e) {
                echo "error " . $e->getMessage();
            }
        }

        public function sobreescribirCapitanEquipo($id_equipo){
            $consulta=$this->db->query("SELECT id_jugador FROM jugadores where id_equipo = $id_equipo && capitan = 1");
            
            if ($consulta){
                $filas=$consulta->fetch(PDO::FETCH_ASSOC);

                if($filas){
                    $valor = $filas['id_jugador'];
                    echo $valor;
                    try{
                        $sqlActualizacion = "UPDATE jugadores SET capitan = ? WHERE id_jugador = ?";
                        $actualizacion = $this->db->prepare($sqlActualizacion);
                        $actualizacion->execute([0, $valor]);
                    }catch (PDOException $e) {
                        echo "error " . $e->getMessage();
                    }
                    
                } else {
                    echo "No se encontraron resultados en la consulta";
                }
            } else {
                echo "Error en la consulta";
            }
        
        }

    }

     

?>