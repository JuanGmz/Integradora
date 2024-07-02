<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escáner de QR con PHP</title>
</head>
<body>
    <h1>Escáner de QR con PHP</h1>

    <!-- Contenedor para el video de la cámara -->
    <div id="video-container">
        <video id="video" playsinline autoplay></video>
    </div>

    <!-- Botón para capturar imagen y enviar a PHP -->
    <button onclick="captureQR()">Capturar código QR</button>
    
    <!-- Mostrar resultado del escaneo -->
    <div id="qr-result"></div>

    <script>
        // Acceder a la cámara y mostrar la vista previa en el elemento de video
        navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            var video = document.getElementById('video');
            video.srcObject = stream;
            video.play();
        })
        .catch(function(err) {
            console.error('Error al acceder a la cámara: ', err);
        });

        // Capturar una imagen de la cámara y enviarla a PHP para procesar
        function captureQR() {
            var canvas = document.createElement('canvas');
            var video = document.getElementById('video');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

            var imageDataURL = canvas.toDataURL('image/png');

            // Enviar la imagen al servidor PHP
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'scan.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('qr-result').innerHTML = xhr.responseText;
                }
            };
            xhr.send('image=' + encodeURIComponent(imageDataURL));
        }
    </script>
</body>
</html>


