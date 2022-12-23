<?php

function obtenerServicios() : array {
  try {
    //* 1. Crear una conexión
    require 'database.php';
 
    //* 2. Escribir código SQL
    $sql = 'SELECT * FROM servicios';
    $query = mysqli_query($db, $sql);

    //* 3. Obtener los resultados
    $servicios = [];
    while ($row = mysqli_fetch_assoc($query)) {
      $servicios[] = $row;
    }

    return $servicios;

  } catch (\Throwable $th) {
    var_dump($th);
  }
}