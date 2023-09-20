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

<body>
<form method="POST" action="index.php?c=Equipos&a=guardarEquipo">
        <label for="nombre">Nombre del Equipo:</label>
        <input type="text" id="nombre_equipo" name="nombre_equipo" required>
        <br><br>

        <label for="pais">País del Equipo:</label>
        <input type="text" id="pais_equipo" name="pais_equipo" required>
        <br><br>

        <label for="ciudad">Ciudad del equipo:</label>
        <input type="text" id="ciudad_equipo" name="ciudad_equipo" required>
        <br><br>

        <label for="deporte">Deporte:</label>
        <input type="text" id="deporte" name="deporte" required>
        <br><br>

        <label for="fecha">Fecha de Fundación:</label>
        <input type="date" id="fecha_fundacion" name="fecha_fundacion" required>
        <br><br>

        <input type="submit" value="Guardar Equipo">
    </form>
    <a href="../index.php">Volver al Listado de Equipos</a>
</body>
</html>