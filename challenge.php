<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario POST con JSON</title>
    <script>
        // Esta función se ejecutará cuando se envíe el formulario
        function enviarDatos(event) {
            // Prevenir el comportamiento por defecto del formulario (envío directo)
            event.preventDefault();

            // Datos que quieres enviar en formato JSON
            const datos = {
                username: "foris_challenge",
                password: "ForisChallenge"
            };

            // Enviar solicitud POST con fetch
            fetch('http://mini-challenge.foris.ai/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json' // Indicar que el contenido es JSON
                },
                body: JSON.stringify(datos) // Convertir los datos a una cadena JSON
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Convertir la respuesta a JSON
            })
            .then(data => {
                // Aquí puedes manejar la respuesta
                console.log(data);
            })
            .catch(error => {
                // Aquí puedes manejar el error, si ocurre
                console.error('Error:', error);
            });
        }
    </script>
</head>
<body>

<form onsubmit="enviarDatos(event)">
    <button type="submit">Enviar Datos</button>
</form>

</body>
</html>