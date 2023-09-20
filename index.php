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
                cargarAccion($controlador, $_GET['a']);
            }else {
                cargarAccion($controlador, ACCION_PRINCIPAL);
            }
        
        } else {
            $controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
            $accionTmp = ACCION_PRINCIPAL;
            $controlador->$accionTmp();
        }


















    // Carga de las clases y configuración necesaria
/*require_once 'config.php'; // Archivo de configuración
require_once 'models/EquipoModel.php'; // Modelo para la gestión de equipos
require_once 'controllers/EquipoController.php'; // Controlador de equipos

// Verificar la acción solicitada en la URL
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    // Inicializar el controlador
    $equipoController = new EquiposController();

    switch ($accion) {
        case 'guardar':
            // Llamar al método guardarEquipo en el controlador
            $equipoController->guardarEquipo();
            break;

        case 'listar':
            // Llamar al método listarEquipos en el controlador
            $equipoController->listarEquipos();
            break;

        default:
            // Manejo de acción por defecto o error
            echo "Acción no válida.";
            break;
    }
} else {
    // Por defecto, listar los equipos
    $equipoController = new EquiposController();
    $equipoController->listarEquipos();
}*/

        //require_once("Controller/equiposController.php");

        /*$rutas = array(
            'listar' => 'EquiposController@listarEquipos',
            'formulario' => 'EquiposController@mostrarFormulario',
            'guardar' => 'EquiposController@guardarEquipo'
        );
        
        if (isset($_GET['ruta'])) {
            $ruta = $_GET['ruta'];
        } else {
            $ruta = 'listar'; // Ruta predeterminada si no se especifica ninguna
        }

        var_dump($ruta);

        if (array_key_exists($ruta, $rutas)) {
            $rutaDividida = explode('@', $rutas[$ruta]);
            $controlador = $rutaDividida[0];
            $accion = $rutaDividida[1];
        } else {
            // Manejar una ruta no válida o desconocida
            // Puedes redirigir a una página de error, por ejemplo
        }

        $nombreControlador = $controlador;
        var_dump($accion);
        var_dump($_GET['accion']);
        include('Controller/' . $nombreControlador . '.php');

        $controller = new $nombreControlador();

        if (method_exists($controller, $accion)) {
            $controller->$accion();
        } else {
            // Manejar una acción no válida o desconocida
            // Puedes redirigir a una página de error, por ejemplo
            echo "Bro que pasa";
        }
        

        /*$control = new EquiposController();
        $control->index();*/
    ?>
</body>
</html>