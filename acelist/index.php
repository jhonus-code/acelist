<?php
// Enlace de publicidad (Amazon)
$amazonUrl = "https://amzn.to/3Ube1Nd";  // Cambia esto al enlace de publicidad que prefieras

// Segunda URL (AceStream)
$aceStreamUrl = isset($_GET['url']) ? $_GET['url'] : 'acestream://YOUR_ACE_STREAM_LINK'; // La URL del AceStream que recibes como parámetro
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Meta etiqueta para móviles -->
    <title>Publicidad - Redirigiendo al contenido...</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            font-size: 24px;
        }

        p {
            font-size: 18px;
        }

        .link-container {
            margin: 20px 0;
        }

        #acestream-link, #countdown-message {
            display: none;  /* Ocultamos inicialmente el contador y el enlace de AceStream */
        }

        .countdown {
            font-size: 20px;
            font-weight: bold;
        }

        a {
            font-size: 22px;
            color: blue;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 20px;
            }

            p, .countdown, a {
                font-size: 18px;
            }
        }
    </style>
    <script type="text/javascript">
        // Temporizador para mostrar el enlace de AceStream después de 20 segundos
        var countdown = 20;  // Tiempo en segundos

        // Función para iniciar el temporizador y mostrar el enlace de AceStream
        function startCountdown() {
            document.getElementById('countdown-message').style.display = 'block';  // Mostrar el mensaje de cuenta regresiva
            var interval = setInterval(function() {
                countdown--;  // Decrementamos el contador
                document.getElementById('countdown-timer').innerHTML = countdown;  // Actualizamos el texto con los segundos restantes

                if (countdown <= 0) {
                    clearInterval(interval);  // Detenemos el temporizador cuando llega a 0
                    document.getElementById('acestream-link').style.display = 'block';  // Mostramos el enlace de AceStream
                    document.getElementById('countdown-message').style.display = 'none';  // Ocultamos el mensaje de cuenta regresiva
                }
            }, 1000);  // Ejecutar cada segundo (1000 ms)
        }

        // Detectar el clic en el enlace de Amazon
        function handleAmazonClick() {
            // Iniciar el temporizador después de hacer clic en el enlace de Amazon
            startCountdown();
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Ayuda al Creador a conservar esto</h1>
        <p>Para obtener el link, primero visita nuestro patrocinador:</p>
        <div class="link-container">
            <!-- Detectamos el clic con el evento onclick -->
            <a href="<?php echo $amazonUrl; ?>" target="_blank" onclick="handleAmazonClick();">
               🔗 Haz clic aquí
            </a>
        </div>
        
        <!-- Mensaje de cuenta regresiva que aparece tras hacer clic en el enlace de Amazon -->
        <div id="countdown-message">
            <p class="countdown">El enlace de AceStream aparecerá en <span id="countdown-timer">20</span> segundos...</p>
        </div>

        <!-- Enlace AceStream que aparece tras los 20 segundos -->
        <div id="acestream-link" class="link-container">
            <p>Ahora puedes acceder a tu enlace de AceStream:</p>
            <a href="<?php echo htmlspecialchars($aceStreamUrl); ?>" style="color: green;">
                🔗 Abrir AceStream
            </a>
        </div>
    </div>
</body>
</html>
