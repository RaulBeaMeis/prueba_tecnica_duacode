<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sín titulo</title>

<style>

h1{text-align:center;
}

</style>
</head>

<body>
    <h1>EQUIPOS</h1>
    <br>
    <?php


        include "config.php";
        include "routes.php";
        include "Controller/EquiposController.php";
        if(isset($_GET['c'])){

            $controlador = cargarControlador($_GET['c']);

            if(isset($_GET['a'])){
                if(isset($_GET['id_jugador'])){
                    if(isset($_GET['id_equipo'])){
                        cargarAccion($controlador, $_GET['a'], $_GET['id_jugador'], $_GET['id_equipo']);
                    } else {
                        cargarAccion($controlador, $_GET['a'], $_GET['id_jugador']);
                    }
                } elseif(isset($_GET['id_equipo'])) {
                    cargarAccion($controlador, $_GET['a'], $_GET['id_equipo']);
                } else {
                    cargarAccion($controlador, $_GET['a']);
                }

                
                
            }else {
                cargarAccion($controlador, ACCION_PRINCIPAL);
            }
        
        } else {
            $controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
            $accionTmp = ACCION_PRINCIPAL;
            $controlador->$accionTmp();
        }
    ?>
</body>
</html>