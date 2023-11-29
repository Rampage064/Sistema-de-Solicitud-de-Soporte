<?php
  session_start(); 
  include './lib/class_mysql.php';
  include './lib/config.php';
  header('Content-Type: text/html; charset=UTF-8');
  session_unset();
  session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Eliminar</title>
        <?php include "./inc/links.php"; ?>       
    </head>
    <body>
      <?php include "./inc/navbar.php"; ?>
        <div class="container">
          <br><br><br>
          <div class="row">
            <div class="col-md-12 text-center">
              <img src="img/delete.png" alt="">
              <h1 class="text-danger">Su cuenta ha sido eliminada exitosamente</h1>
              <h3 class="text-primary">Cuenta eliminada exitosamente.</h3>
            </div>
          </div>
          <br><br>
        </div>
      <?php include './inc/footer.php'; ?>
    </body>
</html>