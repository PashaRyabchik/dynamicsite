<?php
  $title = 'Форма регистрации';
  require_once "blocks/head.php";
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
  <body id="reg">
    <div class="container">
      <h2>Форма регистрации</h2><hr>
      <div class="row">
      <div class="col-sm-8 offset-sm-3">
      <form class="form-horizontal" action="regf.php" method="post">
        <div class="form-group">
          <label class="col-sm-2" for="login">Имя:</label>
          <div class="col-sm-6">
            <input class="form-control" type="text" name="login" >
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2" for="pass">Пароль:</label>
          <div class="col-sm-6">
            <input class="form-control" type="password" name="pass">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2" for="passc">Повторить пароль:</label>
          <div class="col-sm-6">
            <input class="form-control" type="password" name="passc">
          </div>
        </div>
        <?php
          if (!empty($_POST)) {
            include_once('reg.php');
            if (!empty($error)) {
              echo "<div class='row'>
                <div class='col-sm-8'>
                  <div class='alert alert-danger'>
                    $error
                  </div>
                </div>
              </div>";
            }
            elseif (!empty($success)) {
              echo "<div class='row'>
                <div class='col-sm-8'>
                  <div class='alert alert-success'>
                    $success
                  </div>
                </div>
              </div>";
          }
        }
         ?>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Регистрация</button>
          </div>
        </div>
        </form>
      </div>
    </div>
        <hr>
        <a href="authf.php" class="btn btn-success" role="button">Войти</a>
        <a href="index.php" class="btn btn-info" role="button">На главную</a>
        <hr>
    </div>
  </body>
</html>
