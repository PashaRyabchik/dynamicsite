<?php
  require_once "connect.php";
  if (!empty($_POST['name']) && !empty($_POST['pass'])) {
    $name = htmlspecialchars($_POST['name']);
    $pass = htmlspecialchars($_POST['pass']);
    global $mysqli;
    connectDB();
    $db = $mysqli->query("SELECT * FROM `users` WHERE `name` = '$name'");
    $res = $db->fetch_assoc();
    closeDB();
    if (md5($pass) == $res['password']) {
      session_start();
      $_SESSION['name'] = $name;
      echo "<script>
         window.setTimeout(function(){
           window.location.href = 'http://dynamicsite/index.php';
         }, 1000);
       </script>";
    }
    else {
      echo "Пароль или имя не верны!";
    }
  }
 ?>
