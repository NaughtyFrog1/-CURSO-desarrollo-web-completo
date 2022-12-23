<?php
  $conn = new mysqli('localhost', 'root', 'ManucoSQL', 'gdlwebcamp');

  if($conn -> connect_error) {
    echo $error -> $conn -> connect_error;
  }
?>