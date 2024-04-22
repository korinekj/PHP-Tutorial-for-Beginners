<?php
session_start();

require_once('./inc/config.php');
require_once('./inc/functions.php');

ensure_user_is_authenticated();
?>

<h1>vítej na admin stránce <?php echo ($_SESSION['email'])  ?></h1>

<form action="./logout.php" method="POST">

  <div class="from-group">
    <input type="submit" name="logout" value="ODHLÁSIT SE" />
  </div>
</form>

<button><a href="./logout.php">ODHLÁSIT SE</a></button>