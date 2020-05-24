<header>
  <h1 class="logo" onclick="location.href='index.php'">Online Tester</h1>
  <nav class="header-right">
    <a class="text-dark" href="index.php">Главная</a>
    <a class="text-dark" href="about.php">Возможности</a>
    <a class="text-dark" href="authors.php">Авторы</a>
  </nav>

  <?php
    if ($_COOKIE['user'] == '') {
      if ($_COOKIE['student'] == ''): ?>
        <a class="btn" onclick="show_popup()">Войти</a>
      <?php else:?>
      <a class="btn" href="testpanel.php">Тестирование</a>
      &nbsp;&nbsp;
      <a class="btn" href="php_script/exit.php">Выйти</a>
    <?php endif; ?>
    <?php } else { ?>
      <a class="btn" href="controlpanel.php">Кабинет</a>
      &nbsp;&nbsp;
      <a class="btn" href="php_script/exit.php">Выйти</a>
    <?php } ?>
</header>
