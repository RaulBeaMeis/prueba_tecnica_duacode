<?php
    class JugadoresController{

        public function __construct(){
            require_once "Modelo/JugadoresModel.php";
            require_once "Modelo/Equipos_modelo.php";
        }

        public function listarJugadores($id_equipo) {
            require_once "Modelo/JugadoresModel.php";
            $jugador = new JugadoresModel();
            $matrizJugadores['jugadores'] = $jugador->getJugadores($id_equipo);
            require_once("Vista/listado_jugadores.php");
        }

        public function nuevoJugador() {

            require_once("Vista/formulario_crear_jugadores.php");
    
        }

        public function modificarJugadorForm($id_jugador){
            require_once "Modelo/JugadoresModel.php";
            $jugador = new JugadoresModel();
            $jugadorEditado['jugadores'] = $jugador->getJugadoresToEdit($id_jugador);
            require_once("Vista/formularioEditarJugadores.php");
        }

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

                    $actualizarCapitanEquipo = new Equipos_modelo();
                    $actualizarCapitanEquipo->actualizarCapitanEquipo($id_equipo, $nombre_jugador);
                    header('Location: index.php?c=jugadores&a=listarJugadores&id_equipo='.$id_equipo);
                    exit;
                } else {
                    // Manejar el caso en que no se pudo guardar el equipo (por ejemplo, mostrar un mensaje de error)
                    echo "No funcionó";
                }
            }
        }

        public function eliminarJugadores($id_jugador, $id_equipo){
            $jugadorEliminado = new JugadoresModel();
            $jugadorEliminado->eliminarJugadores($id_jugador);
            if ($jugadorEliminado !== false) {
                // El equipo se guardó exitosamente, puedes redirigir o mostrar un mensaje de éxito
                header('Location: index.php?c=jugadores&a=listarJugadores&id_equipo='.$id_equipo);
                exit;
            } else {
                // Manejar el caso en que no se pudo guardar el equipo (por ejemplo, mostrar un mensaje de error)
                echo "No funcionó";
            }
        }

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
                    // El equipo se guardó exitosamente, puedes redirigir o mostrar un mensaje de éxito
                    $actualizarCapitanEquipo = new Equipos_modelo();
                    $actualizarCapitanEquipo->actualizarCapitanEquipo($id_equipo, $nombre_jugador);
                    header('Location: index.php?c=jugadores&a=listarJugadores&id_equipo='.$id_equipo);
                    exit;
                } else {
                    // Manejar el caso en que no se pudo guardar el equipo (por ejemplo, mostrar un mensaje de error)
                    echo "No funcionó";
                }
            }
        }
    }

    

?>