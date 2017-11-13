<?php
  require_once "connect.php";
  //auth
  if (!empty($_POST['name']) && !empty($_POST['pass'])) {
    $name = htmlspecialchars($_POST['name']);
    $pass = htmlspecialchars($_POST['pass']);
    global $mysqli;
    connectDB();
    $db = $mysqli->query("SELECT * FROM `users` WHERE `name` = '$name'");
    $res = $db->fetch_assoc();
    closeDB();
    if (md5($pass.$res['salt']) == $res['password']) {
      session_start();
      $_SESSION['name'] = $name;
      echo "<script>
           window.location.href = 'http://dynamicsite/index.php';
       </script>";
    }
    else {
      echo "<span style = 'color: red'>Пароль или имя не верны!</span>";
    }
  }
 ?>
