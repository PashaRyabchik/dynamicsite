<?php
  $title = 'Вход';
  require_once "blocks/head.php";
?>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#done').click(function () {
        $('#messageShow').hide();
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
          $('#messageShow').html(fail).css('color', 'red');
          $('#messageShow').show ();
          return false;
        }
        $.ajax ({
          url: 'functions/auth.php',
          type: 'POST',
          cache: false,
          data: {'name': name, 'pass': pass},
          dataType: 'html',
          success: function (data) {
            $('#messageShow').html(data).css('color', 'blue');
            $('#messageShow').show ();
          }
        });
      });
    });
  </script>
  <body id="auth">
    <?php require_once "blocks/header.php" ?>
    <div id="wrapper">
      <div>
        <a href="index.php" role="button">На главную</a>
        <a href="regf.php" role="button">Регистрация</a>
      </div>
      <div id="messageShow">Введите свои данные</div>
        <div id="form">
          <input id="name" type="text" placeholder="Ваше имя">
          <input id="pass" type="password" placeholder="Ваш пароль">
          <input type="submit" name="submit" id="done" value="Вход">
        </div>
      </div>
  </body>
</html>
