<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= $titulo ?></title>
  <link 
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&family=Source+Code+Pro&display=swap" 
    rel="stylesheet"
  >
  <link rel="stylesheet" href="<?= ROOT_REL ?>css/normalize.min.css">
  <link rel="stylesheet" href="<?= ROOT_REL ?>css/main.css?v=<?= time(); ?>">
  <!-- Versionamos con el tiempo en UNIX para evitar problemas con cache -->
</head>

<body id="index">
  <div class="container">
    <header>
      <a class="btn volver" href="./">Volver</a>
      <h1><?= $titulo ?></h1>
    </header>

    <main class="code-box">
    