<!DOCTYPE html>
<html>

<head>
    <title>Mensajito Diario</title>
    <link rel="stylesheet" href="style.css"> <!-- Reemplaza con el nombre de tu archivo CSS -->
    <script>
        window.onload = function() {
            // Cargar los mensajes
            fetch('messages.json')
                .then(response => response.json())
                .then(messages => {
                    let now = new Date();

                    // Conversiones a la hora de CDMX (UTC -5)
                    let offset = now.getTimezoneOffset() / 60;
                    now.setHours(now.getHours() + (offset + 5));

                    let lastUpdate = localStorage.getItem('nextUpdate');
                    let messageIndex = localStorage.getItem('lastMessageIndex');

                    // Si no se ha alcanzado la hora de actualización, mostrar el mensaje anterior
                    if (lastUpdate && now.getTime() < lastUpdate) {
                        document.getElementById('message').innerText = messages[messageIndex];
                        return;
                    }

                    // Seleccionar un índice de mensaje al azar que no sea igual al último
                    do {
                        messageIndex = Math.floor(Math.random() * messages.length);
                    } while (messageIndex == localStorage.getItem('lastMessageIndex'));

                    // Guardar el índice del mensaje de hoy para la próxima vez
                    localStorage.setItem('lastMessageIndex', messageIndex);

                    // Mostrar el mensaje en la página
                    document.getElementById('message').innerText = messages[messageIndex];

                    // Calcular la próxima fecha de actualización
                    let nextUpdate = new Date(now);

                    if (now.getHours() < 5) {
                        nextUpdate.setHours(10, 0, 4, 0);
                    } else if (now.getHours() < 19) {
                        nextUpdate.setHours(19, 0, 0, 0);
                    } else {
                        nextUpdate.setDate(nextUpdate.getDate() + 1);
                        nextUpdate.setHours(5, 0, 0, 0);
                    }

                    // Guardar la próxima fecha de actualización
                    localStorage.setItem('nextUpdate', nextUpdate.getTime());
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</head>

<body>
    <div class="message">
        <h2>Mensajito Diario</h2>
        <p id="message"></p>
        <a href=" index.php" class="button">Regresar</a>
        <p style="font-size: 13px; color: #848884;"><span style="color: #0d0d20;">*</span>Nuevo mensaje todos los días a las 5:00 y 19:000 hrs.</p>
    </div>
</body>

</html>