<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>PHP Fundamentals: <?= $view_bag['title']; ?></title>
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/css/php-fundamentals.css" rel="stylesheet" />
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo isset($_SESSION['email']) ? "/4.1/admin/" : "/4.1/" ?>">PHP Fundamentals: <?= $view_bag['title'] ?? "test"; ?></a>
    </div>
  </nav>

  <?php require("{$name}.view.php") ?>

</body>
<h1>Footer</h1>

</html>