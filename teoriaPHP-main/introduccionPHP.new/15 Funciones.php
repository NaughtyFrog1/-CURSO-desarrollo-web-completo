<?php
  require_once '../includes/app.php';

  $titulo = '15 Funciones';
  include_once ROOT_ABS . 'includes/header.php';
?>

<?php
  // A partir de la version 7 le podemos indicar el tipo de dato que requiere un
  // argumento de la funcion.
  // Podemos agregar valores por default
  // void indica que la funcion no retorna ningún valor.
  function sumar(int $x = 0, int $y = 0) : void {
    echo $x + $y;
  }

  sumar(2, 3);
  echo '<br>';
  sumar(3);
  echo '<br>';
  //sumar(2, 3.14);

  echo '<hr>';


  // Podemos definir un tipo de dato para el valor de retorno
  function usuarioAutenticado(bool $autenticado) : string {
    return $autenticado
      ? 'El usuario esta autenticado'
      : 'El usuario no esta autenticado';
  }

  echo usuarioAutenticado(true) . '<br>';
  echo usuarioAutenticado(false) . '<br>';

  // Con `?type` puede o no devolver un tipo de dato.
  function esPar(int $num) : ?bool {
    return ($num % 2 === 0) ? true : null;
  }
  echo esPar(3);
  echo esPar(4) . '<br>';

  // En PHP8 se crearon las uniones, se puede especificar más de un tipo de dato
  function nuevaSuma(int|float $x, int|float $y) : int|float {
    return $x + $y;
  }

  echo nuevaSuma(2, 3.14) . '<br>';

  // En PHP8 se agregaron los parametros nombrados, que nos permiten cambiar el
  // orden en el que pasamos los argumentos de una función

  function parImpar(string $tipo = 'par', int $numero) : bool {
    if ($tipo === 'par') {
      return ($numero % 2 === 0) ? true : false;
    } else if ($tipo === 'impar') {
      return ($numero % 2 === 0) ? false : true;
    }
  }

  var_dump(parImpar(numero: 12));
?>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
