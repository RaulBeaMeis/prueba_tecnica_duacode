<!doctype html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta charset="utf-8">
<title>Documento sín titulo</title>
</head>

<body>
<form id="formEquipos" method="POST" action="index.php?c=Equipos&a=guardarEquipo">
        <label for="nombre">Nombre del Equipo:</label>
        <input type="text" id="nombre_equipo" name="nombre_equipo" >
        <br><br>

        <label for="pais">País del Equipo:</label>
        <input type="text" id="pais_equipo" name="pais_equipo" >
        <br><br>

        <label for="ciudad">Ciudad del equipo:</label>
        <input type="text" id="ciudad_equipo" name="ciudad_equipo" >
        <br><br>

        <label for="deporte">Deporte:</label>
        <select id ="deporte" name="deporte">
            <option value="Fútbol">Fútbol</option>
            <option value="Baloncesto">Baloncesto</option>
            <option value="Balonmano">Balonmano</option>
            <option value="Voleyball">Voleyball</option>
        </select>
        <br><br>

        <label for="fecha">Fecha de Fundación:</label>
        <input type="date" id="fecha_fundacion" name="fecha_fundacion" >
        <br><br>

        <input type="submit" value="Guardar Equipo">
</form>
    <a href="index.php"><button>Volver al Listado de Equipos</button></a>

    <script>
        $(document).ready(function() {
            $("#formEquipos").submit(function(event) {
                // Detener el envío del formulario
                event.preventDefault();
                
                // Validar que el nombre no esté vacio
                var nombre = $("#nombre_equipo").val();
                if (nombre === "") {
                    alert("Por favor, ingresa el nombre del equipo.");
                    return;
                }
                
                // Validar que el numero de la camiseta no esté vacio
                var pais = $("#pais_equipo").val();
                if (numero === "") {
                    alert("Por favor, ingresa un pais.");
                    return;
                }

                // Validar que la fecha no esté vacia
                var ciudad = $("#ciudad_equipo").val();
                if (fecha === "") {
                    alert("Por favor, ingresa una ciudad");
                    return;
                }

                // Validar que la fecha no esté vacia
                var fecha = $("#fecha_fundacion").val();
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