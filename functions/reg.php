<?php
    require_once "connect.php";
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
    //Регистрация
    if (!empty($_POST['name'] && !empty($_POST['pass']))) {
      $name = htmlspecialchars($_POST['name']);
      $pass = htmlspecialchars($_POST['pass']);
      global $mysqli;
      connectDB ();
      $nam = $mysqli->query("SELECT `name` FROM `users` WHERE `name` = '$name'");
      $res = mysqli_fetch_assoc($nam);
        if ($res == null) {
          $salt = generateSalt();
          $password = md5($pass.$salt);
          $mysqli->query("INSERT INTO `users`(`name`, `password`,`salt`) VALUES ('".$name."', '".$password."','".$salt."')");
          closeDB();
          echo "Вы зарегистрированы, теперь вы можете войти";
          echo "<script>
             window.setTimeout(function(){
               window.location.href = 'http://dynamicsite/authf.php';
             }, 3000);
           </script>";
        }
        else {
          echo "<span style = 'color: red'>Имя уже занято!</span>";
          closeDB();
        }
      }
?>
