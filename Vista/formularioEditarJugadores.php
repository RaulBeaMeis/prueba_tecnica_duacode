<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sín titulo</title>
<style>
    table{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    th, td {
        border: 1px solid black;
        padding: 10px;
    }

    .primera_fila {
        background-color: #B5B2B2;
    }
</style>
</head>

<?php

foreach ($jugadorEditado["jugadores"] as $jugador):

$id_jugador = $jugador['id_jugador'];

$nombre_jugador = $jugador['nombre_jugador'];

$numero_jugador = $jugador['num_jugador'];

$fecha_nacimiento = $jugador['fech_nac'];

$capitan = $jugador['capitan'];

$id_equipo = $jugador['id_equipo'];

endforeach

?>

<body>
<form method="POST" action="index.php?c=jugadores&a=guardarModificacionJugador&id_jugador=<?php echo $id_jugador ?>">
        <label for="nombre">Nombre del jugador:</label>
        <input type="text" id="nombre_jugador" name="nombre_jugador" value=<?php echo $nombre_jugador ?> required>
        <br><br>

        <label for="pais">Número del jugador:</label>
        <input type="text" id="num_jugador" name="num_jugador" value=<?php echo $numero_jugador ?> required>
        <br><br>

        <label for="fecha">Fecha de nacimiento:</label>
        <input type="date" id="fech_nac" name="fech_nac" value=<?php echo $fecha_nacimiento ?> required>
        <br><br>


        <label for="capitan">¿Es el capitan del equipo?:</label>
        <input type="checkbox" id="capitan" name="capitan" value=1 <?php if($capitan) echo "checked"; ?>>
        <br><br>

        <input type ="hidden" id="id_equipo" name="id_equipo" value=<?php echo $id_equipo ?>>

    
        <input type="submit" value="Guardar modificación">
    </form>
    <a href="../index.php">Volver al Listado de jugadores</a>
</body>
</html>