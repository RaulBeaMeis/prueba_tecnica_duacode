<!doctype html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta charset="utf-8">
<title>Documento sín titulo</title>
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
    <form id=formJugadores method="POST" action="index.php?c=jugadores&a=guardarModificacionJugador&id_jugador=<?php echo $id_jugador ?>">
        <label for="nombre">Nombre del jugador:</label>
        <input type="text" id="nombre_jugador" name="nombre_jugador" value=<?php echo $nombre_jugador ?> >
        <br><br>

        <label for="pais">Número de camiseta:</label>
        <input type="text" id="num_jugador" name="num_jugador" value=<?php echo $numero_jugador ?> >
        <br><br>

        <label for="fecha">Fecha de nacimiento:</label>
        <input type="date" id="fech_nac" name="fech_nac" value=<?php echo $fecha_nacimiento ?> >
        <br><br>


        <label for="capitan">¿Es el capitan del equipo?:</label>
        <input type="checkbox" id="capitan" name="capitan" value=1 <?php if($capitan) echo "checked"; ?>>
        <br><br>

        <input type ="hidden" id="id_equipo" name="id_equipo" value=<?php echo $id_equipo ?>>

    
        <input type="submit" value="Guardar modificación">
    </form>
    <a href="index.php?c=jugadores&a=listarJugadores&id_equipo=<?php echo $id_equipo ?>"><button>Volver al Listado de jugadores</button></a>

    <script>
        $(document).ready(function() {
            $("#formJugadores").submit(function(event) {
                // Detener el envío del formulario
                event.preventDefault();
                
                // Validar que el nombre no esté vacio
                var nombre = $("#nombre_jugador").val();
                if (nombre === "") {
                    alert("Por favor, ingresa el nombre del jugador.");
                    return;
                }
                
                // Validar que el numero de la camiseta no esté vacio
                var numero = $("#num_jugador").val();
                if (numero === "") {
                    alert("Por favor, ingresa un número de camiseta.");
                    return;
                }

                // Validar que la fecha no esté vacia
                var fecha = $("#fech_nac").val();
                if (fecha === "") {
                    alert("Por favor, ingresa una fecha");
                    return;
                }
                
                // Si todos los campos están validados, se envia el formulario
                alert("Formulario enviado correctamente.");
                $("#formJugadores")[0].submit();
            });
        });
    </script>
</body>
</html>