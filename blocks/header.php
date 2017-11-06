<header>
    <div id="logo">
      <a href="/" title="Перейти на главную"><span>Ново</span>сти
      </a>
    </div>
    <div id="menuHead">
      <a href="/about.php">
        <div>О нас</div>
      </a>
      <a href="/feedback.php">
        <div>Обратная связь</div>
      </a>
    </div>
    <?php
      if (!empty($_SESSION['name'])) {
        echo "<div id='regAuth'>
          <span>Привет " . $_SESSION['name'] . "</span>
          <a href='../functions/logout.php'>
            <div>Выход</div>
          </a>
        </div>";
      }
      else {
        echo '<div id="regAuth">
          <a href="/regf.php">
            <div>Регистрация</div>
          </a>
          <a href="/authf.php">
            <div>Авторизация</div>
          </a>
        </div>';
      }
     ?>
</header>
