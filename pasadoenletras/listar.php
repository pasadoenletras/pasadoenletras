<?php
function listarArchivosRecursivo($directorio, $ruta_base = '') {
    // Escaneamos lo que hay en el directorio actual
    $elementos = scandir($directorio);
    
    foreach ($elementos as $elemento) {
        // Ignoramos los puntos del sistema y el propio archivo php
        if ($elemento != "." && $elemento != ".." && $elemento != "listar.php") {
            $ruta_real = $directorio . '/' . $elemento;
            $ruta_visual = $ruta_base . $elemento;
            
            // Si es una carpeta, la función se llama a sí misma para entrar
            if (is_dir($ruta_real)) {
                listarArchivosRecursivo($ruta_real, $ruta_visual . '/');
            } else {
                // Si es un archivo, lo imprime en pantalla
                echo $ruta_visual . "<br>";
            }
        }
    }
}

// Ejecutamos la función empezando en la carpeta donde está este archivo
listarArchivosRecursivo('.');
?>