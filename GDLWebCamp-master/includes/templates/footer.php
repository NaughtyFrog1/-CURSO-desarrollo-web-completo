  <footer class="footer-site">
    <div class="footer-contenido container clearfix">
      <div>
        <h3>Sobre <span>gdlwebcamp</span></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, hic placeat, dolor exercitationem, veritatis
          error et nihil facere explicabo minus nam. Nam culpa officiis debitis sit, tempora praesentium exercitationem
          esse. Non provident
          perspiciatis sit asperiores a maiores molestias mollitia. Commodi facilis iste non id adipisci quia sint
          mollitia. Ea ratione facere facilis! Consectetur fugit possimus deserunt, ut vero atque error! Ipsa vero
          consequatur ipsum cupiditate
          inventore unde tenetur incidunt aliquam magnam alias quia, quas odit reprehenderit tempora natus pariatur
          deserunt cum aliquid!</p>
      </div>
      <div>
        <h3>Ultimos <span>tweets</span></h3>
        <ul>
          <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo fugit porro magnam, laudantium tenetur
            beatae quam veniam maiores</li>
          <li>Aspernatur, libero temporibus. Incidunt voluptate quo numquam soluta suscipit eveniet est aspernatur dicta
            aliquam voluptatem adipisci delectus</li>
          <li>Id quasi velit fugit praesentium, optio minus molestias, labore quaerat deleniti in alias eligendi
            laborum, inventore obcaecati vitae accusamus</li>
        </ul>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        <p>Todos los derechos reservados <span>gdlwebcamp </span>2020 &copy;</p>
      </div>
    </div>
    <div class="footer-redes">
      <nav class="redes-sociales">
        <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.pinterest.com" target="_blank"><i class="fab fa-pinterest-p"></i></a>
        <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
      </nav>
    </div>
  </footer>

  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>');

  </script>
  <?php
    foreach ($scripts as $script_path) {
      echo "<script src=\"$script_path\"></script>";
    }
  ?>
  <script src="js/plugins.js"></script>
  <script src="js/main.js?v=<?php echo time() ?>"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () {
      ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview');

  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>