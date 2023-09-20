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

    th, td {
        border: 1px solid black;
        padding: 10px;
    }

    .primera_fila {
        background-color: #B5B2B2;
    }
</style>


</head>
<a href="index.php?c=equipos&a=nuevo">Agregar Nuevo Equipo</a>
<body>
    
    <table>
        <tr >
            <td class="primera_fila">Id del equipo</td>
            <td class="primera_fila">Nombre del equipo</td>
            <td class="primera_fila">Pais del equipo</td>
            <td class="primera_fila">Ciudad del equipo</td>
            <td class="primera_fila">Deporte</td>
            <td class="primera_fila">Fecha de fundación</td>
        </tr>

        <?php
            foreach($matrizJugadores["jugadores"] as $jugador):
                

        ?>

        <tr>
            <td><?php echo $jugador["id_equipo"]?></td>
            <td><?php echo $jugador["nombre_equipo"]?></td>
            <td><?php echo $jugador["pais_equipo"]?></td>
            <td><?php echo $jugador["ciudad_equipo"]?></td>
            <td><?php echo $jugador["deporte"]?></td>
            <td><?php echo $jugador["fecha_creacion"]?></td>
        </tr>

        <?php

endforeach

?>

    </table>
   
</body>
</html>