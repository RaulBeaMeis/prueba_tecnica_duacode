<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sín titulo</title>
<style>

    .contenedor{
        text-align: center;
    }

    table{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
        border-collapse: collapse;
        margin: 0 auto;
        width: 100%;
    }

    th, td {
        border: 1px solid black;
        padding: 10px;
    }

    .primera_fila {
        background-color: #B5B2B2;
    }
</style>
<?php 

$id = $_GET['id_equipo'];

?>

</head>

<body>

    <div class="contenedor">

    <a href="index.php?c=jugadores&a=nuevoJugador&id_equipo=<?php echo $id ?>"><button>Agregar nuevo jugador</button></a>

    
    <table>
        <tr >
            <td class="primera_fila">Nombre del jugador</td>
            <td class="primera_fila">Nombre del jugador</td>
            <td class="primera_fila">Número de camiseta</td>
            <td class="primera_fila">Fecha de nacimiento</td>
            <td class="primera_fila">Capitan</td>
            <td class="primera_fila">Actualizar</td>
            <td class="primera_fila">Eliminar</td>
           
        </tr>

        <?php
            foreach($matrizJugadores["jugadores"] as $jugador):
        ?>

        <tr>
            <td><?php echo $jugador["id_jugador"]?></td>
            <td><?php echo $jugador["nombre_jugador"]?></td>
            <td><?php echo $jugador["num_jugador"]?></td>
            <td><?php echo $jugador["fech_nac"]?></td>
            <td><?php if($jugador["capitan"] == 0){
               echo "No"; }else{ echo "Si";}?></td>
            <td><a href = 'index.php?c=jugadores&a=modificarJugadorForm&id_jugador=<?php echo $jugador["id_jugador"]?>'>Actualizar</a></td>
            <td><a href = 'index.php?c=jugadores&a=eliminarJugadores&id_jugador=<?php echo $jugador["id_jugador"]?>&id_equipo=<?php echo $id ?>'>Eliminar</a></td>
            
        </tr>

        <?php

         endforeach

        ?>

    </table>
    <a href="index.php"><button>Volver al inicio</button></a>
    </div>
</body>
</html>