<!DOCTYPE html>
<html>
  <head>
    <?php
      $title = "Обратная связь";
      require_once "blocks/head.php"
    ?>
    <script>
      $(document).ready (function () {
        $("#done").click (function () {
          $('#messageShow').hide ();
          var name = $("#name").val ();
          var email = $("#email").val ();
          var subject = $("#subject").val ();
          var message = $("#message").val ();
          var fail = "";
          if (name.length < 3)
           fail = "Имя не меньше 3 символов";
          else if (email.split ('@').length - 1 == 0 || email.split ('.').length - 1 == 0)
            fail = "Вы ввели некректный email"
          else if (subject.length < 5)
            fail = "Тема сообщения не менее 5 символов";
          else if (message.length < 5)
            fail = "Сообщение не менее 20 символов";
          if (fail != "") {
            $('#messageShow').html (fail).css('color', 'red');
            $('#messageShow').show ();
            return false;
          }
          $.ajax ({
            url: '/functions/feedback.php',
            type: 'POST',
            cache: false,
            data: {'name': name, 'email': email, 'subject': subject, 'message': message},
            dataType: 'html',
            success: function (data) {
            $('#messageShow').html (data).css('color', 'blue');
            $('#messageShow').show ();
              }
          });
        });
      });
    </script>
  </head>
  <body>
    <?php require_once "blocks/header.php" ?>
    <div id="wrapper">
      <div id="messageShow">Напишите нам свое сообщение</div>
      <div id="form">
        <span>Заполните пожалуйста все поля</span><br>
        <input type="text" name="name" placeholder="Имя" id="name"><br>
        <input type="text" name="email" placeholder="Email" id="email"><br>
        <input type="text" name="subject" placeholder="Тема сообщения" id="subject"><br>
        <textarea name="message" id="message" placeholder="Введите сюда ваше сообщение"></textarea><br>
        <input type="button" name="done" id="done" value="Отправить">
      </div>
    </div>
  </body>
</html>
