<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sín titulo</title>
<style>

    h1{text-align:center;
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

    .contenedor{
        text-align: center;
    }
</style>


</head>
<body>
    <h1>EQUIPOS</h1>
    <div class ="contenedor">

    <a id="crear" href="index.php?c=equipos&a=nuevoEquipo"><button>Agregar nuevo equipo</button></a>

    <table>

        <tr >
            <td class="primera_fila">Id del equipo</td>
            <td class="primera_fila">Nombre del equipo</td>
            <td class="primera_fila">Pais del equipo</td>
            <td class="primera_fila">Ciudad del equipo</td>
            <td class="primera_fila">Deporte</td>
            <td class="primera_fila">Fecha de fundación</td>
            <td class="primera_fila">Capitan</td>
            <td class="primera_fila">Información equipo</td>
        </tr>

        <?php
            foreach($matrizEquipos["equipos"] as $equipo):
                

        ?>

        <tr>
            <td><?php echo $equipo["id_equipo"]?></td>
            <td><?php echo $equipo["nombre_equipo"]?></td>
            <td><?php echo $equipo["pais_equipo"]?></td>
            <td><?php echo $equipo["ciudad_equipo"]?></td>
            <td><?php echo $equipo["deporte"]?></td>
            <td><?php echo $equipo["fecha_creacion"]?></td>
            <td><?php if (!$equipo["nom_capitan"] || ""){ echo "Nadie"; }else{ echo $equipo["nom_capitan"];} ?></td>
            <td><a href = 'index.php?c=jugadores&a=listarJugadores&id_equipo=<?php echo $equipo["id_equipo"]?>'>Info equipo</a></td>
        </tr>

        <?php

endforeach

?>

    </table>

  

    </div>
   
</body>
</html>