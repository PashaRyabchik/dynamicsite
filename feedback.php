<!DOCTYPE html>
<html>
  <head>
    <?php
      $title = "Обратная связь";
      require_once "blocks/head.php"
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            $('#messageShow').html (fail + "<div class='clear'><br></div>");
            $('#messageShow').show ();
            return false;
          }
          $.ajax ({
            url: '/ajax/feedback.php',
            type: 'POST',
            cache: false,
            data: {'name': name, 'email': email, 'subject': subject, 'message': message},
            dataType: 'html',
            success: function (data) {
            $('#messageShow').html (data + "<div class='clear'><br></div>");
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
      <div id="leftCol">
        <input type="text" name="name" placeholder="Имя" id="name"><br>
        <input type="text" name="email" placeholder="Email" id="email"><br>
        <input type="text" name="subject" placeholder="Тема сообщения" id="subject"><br>
        <textarea name="message" id="message" placeholder="Введите сюда ваше сообщение"></textarea><br>
        <div id="messageShow"></div>
        <input type="button" name="done" id="done" value="Отправить">
      </div>
        <?php require_once "blocks/rightCol.php" ?>
    </div>
    <?php require_once "blocks/footer.php" ?>
  </body>
</html>
