<?php

// Solicitar al usuario que ingrese un número o una letra para representar el color del semáforo
echo "Ingrese un número o una letra para representar el color del semáforo: ";
$color = trim(fgets(STDIN));

// Función para imprimir el mensaje según el color del semáforo
function imprimirMensaje($color) {
  switch (strtolower($color)) {

    case 'rojo':
    case '1':
      echo "¡Pare!";
      break;

    case 'amarillo':
    case '2':
      echo "¡Espera!";
      break;

    case 'verde':
    case '3':
      echo "¡Avanza!";
      break;

    default:
      echo "Color no válido.";
  }
}

// Imprimir mensaje correspondiente al color ingresado
imprimirMensaje($color);
?>