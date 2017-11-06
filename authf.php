<?php
  $title = 'Вход';
  require_once "blocks/head.php";
?>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type="text/javascript">
    $(document).ready(function () {
      $('#done').click(function () {
        $('#message').hide();
        var name = $('#name').val ();
        var pass = $('#pass').val ();
        var fail = "";
        if (name.length < 3) {
          fail = "Введите свое имя!";
        }
        else if (pass.length < 6) {
          fail = "Введите пароль!";
        }
        if (fail != "") {
          $('#message').html(fail).css('color', 'red');
          $('#message').show ();
          return false;
        }
        $.ajax ({
          url: 'functions/auth.php',
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
  <body id="auth">
    <div class="container">
      <h2>Форма авторизации</h2>
      <hr>
      <a href="index.php" class="btn btn-info" role="button">На главную</a>
      <a href="regf.php" class="btn btn-primary" role="button">Регистрация</a>
      <hr>
      <div class="row">
      <div class="col-sm-8 offset-sm-3">
      <div class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-2" for="name">Имя:</label>
          <div class="col-sm-6">
            <input class="form-control" id="name" type="text" name="name">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2" for="passw">Пароль:</label>
          <div class="col-sm-6">
            <input class="form-control" id="pass" type="password" name="pass">
          </div>
        </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary" id="done">Вход</button>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
              <div id="message"></div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>
