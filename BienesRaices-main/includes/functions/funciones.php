<?php
declare(strict_types = 1);
require_once 'app.php';

function incluirHeader(string $title = 'Bienes Raices', string $id = '') {
  $site_title = $title;
  $site_id = $id;
  include URL_TEMPLATES . "/header.php";
}

function incluirTemplate(string $nombre) {
  include URL_TEMPLATES . "/${nombre}.php";
}

function validarSesion(): bool {
  session_start();

  if ($_SESSION['login']) {
    return true;
  }

  header('Location: /BienesRaices/login.php');
}