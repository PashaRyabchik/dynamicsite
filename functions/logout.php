<?php
  session_start();
  unset($_SESSION['name']);
  $url = "http://dynamicsite/";
  header('Location: '.$url);
 ?>
