<?php
  $title = 'Форма регистрации';
  require_once "blocks/head.php";
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script type="text/javascript">
  $(document).ready(function () {
    $('#done').click(function () {
      $('#message').hide ();
        var name = $('#name').val ();
        var pass = $('#pass').val ();
        var passc = $('#passc').val ();
        var fail = "";
        if (name.length < 3) {
          fail = "Имя не меньше 3 символов!";
        }
        else if (pass.length < 6) {
          fail = "Пароль не менее 6 символов!";
        }
        else if (passc.length < 6) {
          fail = "Повторите пароль!";
        }
        else if (pass != passc) {
          fail = "Пароли не совпадают!";
        }
        if (fail != "") {
          $('#message').html (fail).css('color', 'red');
          $('#message').show ();
          return false;
        }
        $.ajax ({
          url: 'functions/reg.php',
          type: 'POST',
          cache: false,
          data: {'name': name, 'pass': pass},
          dataType: 'html',
          success: function (data) {
            $('#message').html(data).css('color', 'blue');
            $('#message').show ();
          }
        });
      });
    });
</script>
  <body id="reg">
    <?php require_once "functions/reg.php" ?>
    <div class="container">
      <h2>Форма регистрации</h2>
      <hr>
      <a href="authf.php" class="btn btn-success" role="button">Войти</a>
      <a href="index.php" class="btn btn-info" role="button">На главную</a>
      <hr>
      <div class="row">
      <div class="col-sm-8 offset-sm-3">
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-2" for="name">Имя:</label>
          <div class="col-sm-6">
            <input class="form-control" type="text" name="name" id="name">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2" for="pass">Пароль:</label>
          <div class="col-sm-6">
            <input class="form-control" type="password" name="pass" id="pass">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2" for="passc">Повторить пароль:</label>
          <div class="col-sm-6">
            <input class="form-control" type="password" name="passc" id="passc">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="button" class="btn btn-primary" name="done" id="done" value="Регистрация">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <div id="message"></div>
          </div>
        </div>
      </form>
      </div>
    </div>
    </div>
  </body>
</html>
