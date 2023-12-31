<?php
    class EquiposController{

        public function __construct(){
            require_once "Modelo/EquiposModel.php";
        }
        
        //Gestiona el listado de equipos
        public function listarEquipos() {
    
            require_once "Modelo/EquiposModel.php";
            $equipo = new EquiposModel();
            $matrizEquipos['equipos'] = $equipo->getEquipos();
            require_once("Vista/ListadoEquipos.php");
    
        }
        //Gestiona la entrada al formulario de creación de equipos
        public function nuevoEquipo() {

            require_once("Vista/FormularioCrearEquipos.php");

        }

        //Gestiona el guardado en la base de datos de un nuevo equipo en función a lo enviado en el formulario
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
                    header('Location: index.php');
                    exit;
                } else {
                    echo "Hubo un error al guardar el equipo.";
                }
            }
      


        }
    }

?>