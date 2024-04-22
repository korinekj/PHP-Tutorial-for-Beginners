<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5"><?= $view_bag['heading'] ?></h1>
    </div>
  </div>

  <div class="row">
    <form action="" method="POST">
      <div class="form-group">
        <label for="term">Term:</label>
        <input class="form-control" type="text" name="term" id="term"><br>
      </div>
      <div class="form-group">
        <label for="definition">Definition:</label>
        <textarea class="form-control" name="definition" id="definition"></textarea>
      </div>
      <input type="submit" value="Create Term">

    </form>
  </div>

  <div class="row">

  </div>
</div>