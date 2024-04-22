<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5"><?= $view_bag['heading'] . ": " . $model->term ?></h1>
    </div>
  </div>

  <div class="row">
    <p>Are you sure you want to delete term <?= $model->term ?>?</p>
  </div>

  <div class="row">
    <form action="" method="POST">
      <input type="hidden" name="key" value="<?= $model->id ?>" />
      <input type="submit" value="Delete Term">
    </form>
  </div>
</div>