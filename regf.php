<?php
  $title = 'Форма регистрации';
  require_once "blocks/head.php";
?>
<script type="text/javascript">
  $(document).ready(function () {
    $('#done').click(function () {
      $('#messageShow').hide ();
        var name = $('#name').val ();
        var pass = $('#pass').val ();
        var passc = $('#passc').val ();
        var fail = "";
        if (name.length < 3 || name.length > 12) {
          fail = "Имя не меньше 3 символов и не больше 12!";
        }
        else if (pass.length < 6 || pass.length > 20) {
          fail = "Пароль не меньше 6 символов и не больше 20!";
        }
        else if (passc.length < 6 || passc.length > 20) {
          fail = "Повторите пароль!";
        }
        else if (pass != passc) {
          fail = "Пароли не совпадают!";
        }
        if (fail != "") {
          if (fail.indexOf('Имя') == 0) $('#name').css('border-color', 'red');
          else $('#name').css('border-color', 'blue');
          if (fail.indexOf('Пароль') == 0) $('#pass').css('border-color', 'red');
          else $('#pass').css('border-color', 'blue');
          if (fail.indexOf('Повторите') == 0) $('#passc').css('border-color', 'red');
          $('#messageShow').html (fail).css('color', 'red');
          $('#messageShow').show ();
          return false;
        }
        $.ajax ({
          url: 'functions/reg.php',
          type: 'POST',
          cache: false,
          data: {'name': name, 'pass': pass},
          dataType: 'html',
          success: function (data) {
            $('#passc').css('border-color', 'blue');
            $('#messageShow').html(data).css('color', 'blue');
            $('#messageShow').show ();
          }
        });
      });
    });
</script>
  <body id="reg">
    <?php require_once "blocks/header.php" ?>
    <div id="wrapper">
      <div>
        <a href="authf.php" role="button">Войти</a>
        <a href="index.php" role="button">На главную</a>
      </div>
      <div id="messageShow">Введите свои данные</div>
        <div id="form">
            <input type="text" id="name" placeholder="Ваше имя">
            <input type="password" id="pass" placeholder="Придумайте пароль">
            <input type="password" id="passc" placeholder="Повторите пароль">
            <input type="submit" id="done" value="Регистрация">
        </div>
      </div>
    </div>
  </body>
</html>
