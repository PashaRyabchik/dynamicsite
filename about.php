<!DOCTYPE html>
<html>
  <head>
    <?php
      $title = "Информация о нас";
      require_once "blocks/head.php"
    ?>
  </head>
  <body>
    <?php require_once "blocks/header.php" ?>
    <div id="wrapper">
      <div id="leftCol">
        <div id="about_us">
          <h2>Информация о нас:</h2>
          <br>
          <p> Текст о компании - это разновидность текста, который по умолчанию должен присутствовать на корпоративном сайте. Парадокс в том, что далеко не все посетители его читают - но, он все равно должен присутствовать. Просматривая многочисленные примеры таких текстов на сайтах разных компаний, поневоле напрашивается вывод о том, что к их написанию владельцы сайтов относятся, простите, наплевательски. </p>
        </div>
      </div>
        <?php require_once "blocks/rightCol.php" ?>
    </div>
    <?php require_once "blocks/footer.php" ?>
  </body>
</html>
