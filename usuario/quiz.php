<?php
include("../db.php");

// Consulta a la base de datos para obtener todas las preguntas
$sql = "SELECT * FROM preguntas";
$result = $conn->query($sql);

$preguntas = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $preguntas[] = [
            'ID' => $row['ID'], 
            'enunciado' => $row['enunciado'],
            'opciones' => [$row['opcion_A'], $row['opcion_B'], $row['opcion_C'], $row['opcion_D']],
            'respuesta_correcta' => $row['respuesta_correcta']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz de Preguntas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Quiz de Preguntas</h1>
        
        <div id="quiz-container"></div>

        <button id="next-question-btn">Siguiente pregunta</button>
        <h2 id="result"></h2>
    </div>

    <script>
        const preguntas = <?php echo json_encode($preguntas); ?>;
        let preguntaActual = 0;
        let respuestasCorrectas = 0;

        function mostrarPregunta() {
            const quizContainer = document.getElementById('quiz-container');
            quizContainer.innerHTML = ''; // Limpiar contenido anterior

            if (preguntaActual < preguntas.length) {
                const pregunta = preguntas[preguntaActual];
                const titulo = document.createElement('h3');
                titulo.textContent = pregunta.enunciado;

                const opciones = document.createElement('div');
                pregunta.opciones.forEach(opcion => {
                    const label = document.createElement('label');
                    const input = document.createElement('input');
                    input.type = 'radio';
                    input.name = 'opcion';
                    input.value = opcion;
                    label.appendChild(input);
                    label.appendChild(document.createTextNode(opcion));
                    opciones.appendChild(label);
                    opciones.appendChild(document.createElement('br'));
                });

                quizContainer.appendChild(titulo);
                quizContainer.appendChild(opciones);
            } else {
                mostrarResultados();
            }
        }

        function verificarRespuesta() {
            const opciones = document.querySelectorAll('input[name="opcion"]');
            let respuestaSeleccionada = null;
            opciones.forEach(opcion => {
                if (opcion.checked) {
                    respuestaSeleccionada = opcion.value;
                }
            });

            if (respuestaSeleccionada === preguntas[preguntaActual].respuesta_correcta) {
                respuestasCorrectas++;
            }

            preguntaActual++;
            mostrarPregunta();
        }

        function mostrarResultados() {
            const resultado = document.getElementById('result');
            resultado.textContent = `Tu puntuación${respuestasCorrectas}/${preguntas.length}`;
            document.getElementById('next-question-btn').style.display = 'none'; // Ocultar botón de siguiente
        }

        document.getElementById('next-question-btn').addEventListener('click', verificarRespuesta);
        
        mostrarPregunta(); // Iniciar con la primera pregunta
    </script>
</body>
</html>