<?php
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'spanish');

$fecha = strftime("%A %#d de %B del %Y");
$hora = date("h:i:s A");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fecha y Hora</title>
    <style>
        /* Estilo para el contenedor principal */
        #contenedor {
            position: absolute;
            top: 50px;
            right: 0;
        }

        /* Estilo para posicionar la hora de manera absoluta */
        #hora {
            position: absolute;
            top: 10;
            right: 0;
        }
    </style>
    <script>
        function actualizarHora() {
            var fechaHora = new Date();
            var horas = fechaHora.getHours();
            var minutos = fechaHora.getMinutes();
            var segundos = fechaHora.getSeconds();

            // Agregar cero delante de los números menores a 10
            horas = horas < 10 ? "0" + horas : horas;
            minutos = minutos < 10 ? "0" + minutos : minutos;
            segundos = segundos < 10 ? "0" + segundos : segundos;

            var horaActualizada = horas + ":" + minutos + ":" + segundos;

            document.getElementById("hora").innerHTML = horaActualizada;

            // Actualizar cada segundo
            setTimeout(actualizarHora, 1000);
        }

        // Iniciar la función después de que la página se ha cargado
        window.onload = function() {
            actualizarHora();
        };
    </script>
</head>
<body>
    <div id="contenedor">
        <p><?php echo utf8_encode($fecha); ?></p>
        <p id="hora"><?php echo $hora; ?></p>
    </div>
</body>
</html>

