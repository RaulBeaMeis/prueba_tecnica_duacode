<?php
    class JugadoresController{

        public function __construct(){
            require_once "Modelo/JugadoresModel.php";
            require_once "Modelo/EquiposModel.php";
        }

        //Gestiona el listado de jugadores
        public function listarJugadores($id_equipo) {
            require_once "Modelo/JugadoresModel.php";
            $jugador = new JugadoresModel();
            $matrizJugadores['jugadores'] = $jugador->getJugadores($id_equipo);
            require_once("Vista/ListadoJugadores.php");
        }

        //Gestiona el acceso al formulario de creación de jugadores
        public function nuevoJugador() {

            require_once("Vista/FormularioCrearJugadores.php");
    
        }

        //Gestiona el formulario de modificación de jugadores
        public function modificarJugadorForm($id_jugador){
            require_once "Modelo/JugadoresModel.php";
            $jugador = new JugadoresModel();
            $jugadorEditado['jugadores'] = $jugador->getJugadoresToEdit($id_jugador);
            require_once("Vista/FormularioEditarJugadores.php");
        }

        //Gestiona el guardado en la base de datos de un nuevo jugador en función a lo enviado en el formulario
        public function guardarNuevoJugador($id_equipo){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre_jugador = $_POST["nombre_jugador"];
                $num_jugador = $_POST["num_jugador"];
                $fech_nac= $_POST["fech_nac"];
                $capitan = $_POST["capitan"];

                if ($capitan == 1){
                    $jugadorGuardado = new JugadoresModel();
                    $jugadorGuardado->sobreescribirCapitanEquipo($id_equipo);
                    
                }
        
                $jugadorGuardado = new JugadoresModel();
                $jugadorGuardado->guardarNuevoJugador($nombre_jugador, $num_jugador, $fech_nac, $capitan, $id_equipo);
                if ($jugadorGuardado !== false) { 
                    if($capitan ==1){
                        $actualizarCapitanEquipo = new EquiposModel();
                        $actualizarCapitanEquipo->actualizarCapitanEquipo($id_equipo, $nombre_jugador);
                    }
                    
                    header('Location: index.php?c=jugadores&a=listarJugadores&id_equipo='.$id_equipo);
                    exit;
                } else {
                    echo "Error al guardar los datos";
                }
            }
        }

        //Gestiona la eliminación de jugadores
        public function eliminarJugadores($id_jugador, $id_equipo){
            $actualizarCapitanEquipo = new EquiposModel();
            $actualizarCapitanEquipo->actualizarCapitanEquipoEliminado($id_equipo, $id_jugador);
            $jugadorEliminado = new JugadoresModel();
            $jugadorEliminado->eliminarJugadores($id_jugador);
            if ($jugadorEliminado !== false) {
                
                header('Location: index.php?c=jugadores&a=listarJugadores&id_equipo='.$id_equipo);
                exit;
            } else {
                echo "Error en la eliminación";
            }
        }

        //Gestiona la actualización de los jugadores en la base de datos 
        public function guardarModificacionJugador($id_jugador){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre_jugador = $_POST["nombre_jugador"];
                $num_jugador = $_POST["num_jugador"];
                $fech_nac= $_POST["fech_nac"];
                $capitan = $_POST["capitan"];
                $id_equipo = $_POST["id_equipo"];

                if ($capitan == 1){
                    $jugadorGuardado = new JugadoresModel();
                    $jugadorGuardado->sobreescribirCapitanEquipo($id_equipo);   
                }
        
                $jugadorModificado = new JugadoresModel();
                $jugadorModificado->guardarJugadorModificado($id_jugador, $nombre_jugador, $num_jugador, $fech_nac, $capitan);
                if ($jugadorModificado !== false) {
                    if ($capitan == 1) {
                        $actualizarCapitanEquipo = new EquiposModel();
                        $actualizarCapitanEquipo->actualizarCapitanEquipo($id_equipo, $nombre_jugador);
                    }
                    header('Location: index.php?c=jugadores&a=listarJugadores&id_equipo='.$id_equipo);
                    exit;
                } else {
                    
                    echo "Error en la actualización";
                }
            }
        }
    }

    

?>