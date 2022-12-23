<?php
  
  function obtenerContactos() {
    include 'db_conn.php';
    
    try {
      return $conn->query(
        'SELECT id, nombre, empresa, telefono FROM contactos'
      );
    } catch (Exception $e) {
      echo $e->getMessage() . '<br>';
      return false;
    }
  }

  function obtenerContacto($id) {
    include 'db_conn.php';
    
    try {
      return $conn->query(
        "SELECT id, nombre, empresa, telefono FROM contactos WHERE id = $id"
      );
    } catch (Exception $e) {
      echo $e->getMessage() . '<br>';
      return false;
    }
  }
?>