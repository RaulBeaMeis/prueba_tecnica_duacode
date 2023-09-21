<?php
    class EquiposController{

        public function __construct(){
            require_once "Modelo/EquiposModel.php";
        }
    
        public function listarEquipos() {
    
            require_once "Modelo/EquiposModel.php";
            $equipo = new EquiposModel();
            $matrizEquipos['equipos'] = $equipo->getEquipos();
            require_once("Vista/ListadoEquipos.php");
    
        }

        public function nuevoEquipo() {

            require_once("Vista/FormularioCrearEquipos.php");

        }

        public function guardarEquipo(){

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre_equipo = $_POST["nombre_equipo"];
                $pais_equipo = $_POST["pais_equipo"];
                $ciudad_equipo = $_POST["ciudad_equipo"];
                $deporte = $_POST["deporte"];
                $fecha_fundacion = $_POST["fecha_fundacion"];

                $equipoGuardado = new EquiposModel();
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

?>