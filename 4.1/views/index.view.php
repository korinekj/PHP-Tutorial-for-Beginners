<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5"><?= $view_bag['heading'] ?></h1>
    </div>
  </div>

  <div class="row justify-content-end" style="font-size: 2rem ;">
    <a href="login.php">Login</a>
  </div>

  <div class="row">
    <form class="form-inline" action="index.php" method="GET">
      <div class="form-group">
        <input type="text" name="search" id="search">
        <input type="submit" value="Hledat">
      </div>
    </form>
  </div>

  <div class="row">
    <table class="table table-striped">
      <?php foreach ($model as $item) : ?>
        <tr>
          <td><?= $item->id; ?></td>
          <td><a href="detail.php?term=<?= $item->id; ?>"> <?= $item->term; ?></a></td>
          <td><?= $item->definition; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>