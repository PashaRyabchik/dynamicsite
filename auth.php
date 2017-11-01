<?php
      function generateKey()
      {
        $salt = '';
        $saltLength = 8; //длина соли
        for($i=0; $i<$saltLength; $i++) {
          $salt .= chr(mt_rand(33,126)); //символ из ASCII-table
        }
        return $salt;
      }


  if (!empty($_POST['name']) && !empty($_POST['passw'])) {
    $name = $_POST['name'];
    $passw = $_POST['passw'];

    $con = mysqli_connect('localhost', 'root', '', 'dsite_base');
    $db = mysqli_query($con, 'SELECT * FROM `users` WHERE `name`="'.$name.'"');

    foreach ($db as  $value) {
      $pass = $value['password'];
      $salt = $value['salt'];
      $id = $value['id'];
      }

      if (md5($passw.$salt) == $pass) {
        session_start();
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $name;
        $_SESSION['id'] = $id;

        if (isset($_POST['remember'])) {
          $key = generateKey();

          setcookie('login', $name, time() + 60*60*24*31);
          setcookie('key', $key, time() + 60*60*24*31);

          mysqli_query($con, 'UPDATE users SET cookie="'.$key.'" WHERE name="'.$name.'"') or die($con);



        }

        mysqli_close($con);
      echo "<script>$(location).attr('href','http://regauth/') </script>";
      }
      else {
         $error = 'Не верный пароль или имя!';
            }
    }

  else {
    $error = 'Введите данные...';
  }
 ?>
