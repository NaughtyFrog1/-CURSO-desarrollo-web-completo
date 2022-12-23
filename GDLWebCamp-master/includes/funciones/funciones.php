<?php
  // &argument: The function is getting an the actual variable and not a copy
  // of the variable. Any changes you make to that variable in the function
  // will be mirrored in the caller
  function productos_json(&$boletos, &$camisas = 0, &$etiquetas = 0) {
    $dias = array(0 => 'un_dia', 1 => 'tres_dias', 2 => 'dos_dias');
    $camisas = (int)$camisas;  // (int)$var convierte la variable a int
    $etiquetas = (int)$etiquetas;
    $json = array();
    
    // Combinamos las llaves de $dias con los valores de $boletos
    $total_boletos = array_combine($dias, $boletos);
    foreach ($total_boletos as $key => $boletos) {
      if((int)$boletos > 0 ){
        $json[$key] = (int)$boletos;
      }
    }

    if ($camisas > 0) {
      $json['camisas'] = $camisas;
    }

    if ($etiquetas > 0) {
      $json['etiquetas'] = $etiquetas;
    }

    return json_encode($json);
  }

  
  function eventos_json(&$eventos) {
    $json = array();

    foreach ($eventos as $evento) {
      $json['eventos'][] = $evento;
    }

    return json_encode($json);
  }

?>
