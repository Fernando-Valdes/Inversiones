<?php
// Verificar si autoload.php existe
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    echo "El archivo autoload.php fue encontrado y es accesible.";
} else {
    echo "El archivo autoload.php NO fue encontrado.";
}
