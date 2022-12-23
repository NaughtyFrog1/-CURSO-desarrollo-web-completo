<?php
  require_once '../includes/app.php';

  $titulo = '07 Bucles';
  include_once ROOT_ABS . 'includes/header.php';
?>

<div class="for">
  <h2>Bucle For</h2>
  <ul>
    <?php
      for ($i = 0; $i <= 10; $i++) {
        echo "<li>" . $i;
        if ($i % 2 == 0) {
          echo " par";
        } else {
          echo " impar";
        }
        echo "</li>";
      }
    ?>
  </ul>
  <br>
  <!-- Recorrer arrays -->
  <ul>
    <?php
      $frontend = ['CSS', 'HTML', 'JavaScript', 'jQuery'];

      for ($i = 0; $i < count($frontend); $i++) {
        echo "<li> {$frontend[$i]} </li>";
      }
    ?>
  </ul>
</div>
<div class="while">
  <h2>Bucle While</h2>
  <ul>
    <?php
      $backend = array('NodeJS', 'C++', 'Python', 'Java', 'PHP');
      $i = 0;
      while ($i < count($backend)) {
        echo "<li> {$backend[$i]} </li>";
        $i++;
      }
    ?>
  </ul>
</div>

<?php include_once ROOT_ABS . 'includes/footer.php' ?>
