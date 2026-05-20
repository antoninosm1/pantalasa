<?php
    $nombre_archivo_d = "personas_cedulas_todos_muni__todas_loca__limpieza_vivienda_diario_35.txt";
    header("Cache-Control: no-cache, must-revalidate");
    header("Content-Transfer-Encoding: binary");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . $nombre_archivo_d);
    readfile($nombre_archivo_d);
    unlink($nombre_archivo_d);
    clearstatcache();
?>