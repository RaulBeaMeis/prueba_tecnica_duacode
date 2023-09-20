<?php
    class EquiposController{

        public function __construct(){
            require_once "Modelo/Equipos_modelo.php";
        }
    
        public function listarEquipos() {
    
            require_once "Modelo/Equipos_modelo.php";
            $equipo = new Equipos_modelo();
            $matrizEquipos['equipos'] = $equipo->getEquipos();
            require_once("Vista/Equipos_view.php");
    
        }

        public function listarJugadores($id_equipo) {
            require_once "Modelo/Equipos_modelo.php";
            $equipo = new Equipos_modelo();
            $matrizJugadores['jugadores'] = $equipo->getJugadores($id_equipo);
            require_once("Vista/listado_jugadores.php");
        }

        public function nuevo() {

            require_once("Vista/Crear_equipos_form.php");

        }

        public function guardarEquipo(){

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre_equipo = $_POST["nombre_equipo"];
                $pais_equipo = $_POST["pais_equipo"];
                $ciudad_equipo = $_POST["ciudad_equipo"];
                $deporte = $_POST["deporte"];
                $fecha_fundacion = $_POST["fecha_fundacion"];

                $equipoGuardado = new Equipos_modelo();
                $equipoGuardado->guardarEquipo($nombre_equipo, $pais_equipo, $ciudad_equipo, $deporte, $fecha_fundacion);

                if ($equipoGuardado !== false) {
                    // El equipo se guardó exitosamente, puedes redirigir o mostrar un mensaje de éxito
                    
                    header('Location: index.php');
                    exit;
                } else {
                    // Manejar el caso en que no se pudo guardar el equipo (por ejemplo, mostrar un mensaje de error)
                    echo "<script>console.log('Hubo un error al guardar el equipo.');</script>";
                }
            }
      


        }
    }
    


   
    
    

    /*$matrizEquipos=$equipo->getEquipos();

    //$equipo->crearEquipos($nombre_equipo, $pais_equipo, $ciudad_equipo, $deporte, $fecha_fundacion);

    require_once("Vista/Equipos_view.php");*/

    

?>