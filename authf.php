<?php
  $title = 'Вход';
  require_once "blocks/head.php";
?>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <body id="auth">
    <div class="container">
      <h2>Форма авторизации</h2>
      <hr>
      <a href="index.php" class="btn btn-info" role="button">На главную</a>
      <a href="regf.php" class="btn btn-primary" role="button">Регистрация</a>
      <hr>
      <div class="row">
      <div class="col-sm-8 offset-sm-3">
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-2" for="name">Имя:</label>
          <div class="col-sm-6">
            <input class="form-control" type="text" name="name">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2" for="passw">Пароль:</label>
          <div class="col-sm-6">
            <input class="form-control" type="password" name="passw">
          </div>
        </div>
        <?php
          if (!empty($_POST)) {
            include_once('auth.php');
              echo "<div class='row'>
                <div class='col-sm-8'>
                  <div class='alert alert-danger'>
                    $error
                  </div>
                </div>
              </div>";
          }
         ?>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Вход</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
