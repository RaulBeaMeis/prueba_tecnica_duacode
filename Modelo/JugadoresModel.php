<?php

    class JugadoresModel{

        private $db;

        private $jugadores;

        public function __construct(){
                
            require_once("Conexion.php");

            $this->db=Conexion::conexion();

            $this->jugadores=array();


        }
        //funcion que obtiene a todos los jugadores de la base de datos
        public function getJugadores($id_equipo) {

            $consulta=$this->db->query("SELECT * FROM jugadores where id_equipo = $id_equipo");
    
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                
                $this->jugadores[]=$filas;
    
            }
    
            return $this->jugadores;
        }

        //Función que agrega en la base de datos un jugador completamente nuevo
        public function guardarNuevoJugador($nombre_jugador, $num_jugador, $fech_nac, $capitan, $id_equipo){
            try{
                $consulta = "INSERT INTO jugadores (nombre_jugador, num_jugador, fech_nac, capitan, id_equipo) VALUES (?, ?, ?, ?, ?)";
                $prueba = $this->db->prepare($consulta);
                $prueba->execute([$nombre_jugador, $num_jugador, $fech_nac, $capitan, $id_equipo]);

            }catch (PDOException $e) {
                echo "error " . $e->getMessage();
            }
        }

        //Función que elimina a un jugador de la base de datos
        public function eliminarJugadores($id_jugador){
            try{
                $consulta = "DELETE FROM jugadores WHERE id_jugador = $id_jugador";
                $prueba = $this->db->prepare($consulta);
                $prueba->execute();

                echo "Funciona";
            }catch (PDOException $e) {
                echo "error " . $e->getMessage();
            }
        }

        //Función que obtiene a un jugador concreto pasando su id para despues poder editarlo
        public function getJugadoresToEdit($id_jugador){
            $consulta=$this->db->query("SELECT * FROM jugadores where id_jugador = $id_jugador");
    
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                
                $this->jugadores[]=$filas;
    
            }
    
            return $this->jugadores;

        }

        //Función para guardar las modificaciones hechas sobre un jugador una vez pulsado el botón de confirmar la actualización.
        public function guardarJugadorModificado($id_jugador, $nombre_jugador, $num_jugador, $fech_nac, $capitan){
            try{
                $consulta = "UPDATE jugadores SET nombre_jugador = ?, num_jugador = ?, fech_nac = ?, capitan = ? WHERE id_jugador = ?";
                $prueba = $this->db->prepare($consulta);
                $prueba->execute([$nombre_jugador, $num_jugador, $fech_nac, $capitan, $id_jugador]);
                echo $id_jugador;
                echo "Funciona";
            }catch (PDOException $e) {
                echo "error " . $e->getMessage();
            }
        }

        //Función que sobreescribe al anterior capitan del equipo cuando eliges uno nuevo
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