<?php
    require_once "connect.php";
    //Регистрация
    if (!empty($_POST['name'] && !empty($_POST['pass']))) {
      $name = htmlspecialchars($_POST['name']);
      $pass = htmlspecialchars($_POST['pass']);
      global $mysqli;
      connectDB ();
      $nam = $mysqli->query("SELECT `name` FROM `users` WHERE `name` = '$name'");
      $res = mysqli_fetch_assoc($nam);
        if ($res == null) {
          $password = md5($pass);
          $mysqli->query("INSERT INTO `users`(`name`, `password`) VALUES ('".$name."', '".$password."')");
          closeDB();
          echo "Вы зарегистрированы, теперь вы можете войти";
          echo "<script>
             window.setTimeout(function(){
               window.location.href = 'http://dynamicsite/authf.php';
             }, 3000);
           </script>";
        }
        else {
          echo "Имя уже занято!";
          closeDB();
        }
      }
?>
