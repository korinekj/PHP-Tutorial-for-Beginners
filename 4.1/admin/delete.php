<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
  'title' => 'Delete term and definition',
  'heading' => 'Delete Term'
];

if (is_get()) {
  if (isset($_GET['key'])) {
    $deleted_term = sanitize($_GET['key']);
  }

  if (empty($deleted_term)) {
    view("not_found");
    die();
  }

  $term = Data::get_term($deleted_term);

  if (empty($term)) {
    view("not_found");
    die();
  }

  view('admin/delete', $term);
}

if (is_post()) {
  $term = sanitize($_POST['key']);

  if (empty($term)) {
    // TODO: display message
    echo "empty string";
  } else {
    Data::delete_term($term);

    redirect("index.php");
  }
}
