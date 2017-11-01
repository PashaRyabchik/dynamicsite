<?php
    //make salt
    function generateSalt()
    {
      $salt = '';
      $saltLength = 8; //длина соли
      for($i=0; $i<$saltLength; $i++) {
        $salt .= chr(mt_rand(33,126)); //символ из ASCII-table
      }
      return $salt;
    }

    //proverka i registration
   if (!empty($_POST['pass']) && !empty($_POST['login'])) {
    if ($_POST['pass'] == $_POST['passc']) {
      $login = $_POST['login'];
      $pass = $_POST['pass'];

      if (strlen($pass) >= 6 && strlen($pass) <= 12 && strlen($login) > 3) {
        $con = mysqli_connect('localhost', 'root', '', 'dsite_base');
        $db = mysqli_query($con, 'SELECT * FROM `users` WHERE `name`="'.$login.'"');

        foreach ($db as $value) {
          $res = $value;
        }

        if (!empty($res)) {
          $error = 'Логин уже занят!';
        }

        //registration
        else {
          //salt
          $salt = generateSalt();
          $passsalt = md5($pass.$salt);

          mysqli_query($con, "INSERT INTO `users`(`name`, `password`, `salt`) VALUES ('".$login."', '".$passsalt."', '".$salt."')");

          mysqli_close($con);

          $success = 'Вы зарегистрировани, теперь можно войти.';

          echo "<script>
             window.setTimeout(function(){
               window.location.href = 'http://regauth/logout.php';
             }, 2000);
           </script>";
          }

        }
        else {
          $error = 'Логин не должен бить меньше 3 символов а пароль 6 и не больше 12 символов!';
              }
      }

   else {
          $error = 'Пароли не совпадают!';
   }
}
else {
  $error = 'Введите данные...';
}
?>
