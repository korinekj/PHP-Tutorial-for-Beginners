<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
  'title' => 'Update term and definition',
  'heading' => 'Update Term'
];

if (is_get()) {
  if (isset($_GET['edited_term'])) {
    $edited_term = sanitize($_GET['edited_term']);
  }

  if (empty($edited_term)) {
    view("not_found");
    die();
  }

  $term = Data::get_term($edited_term);

  if (empty($term)) {
    view("not_found");
    die();
  }

  view('admin/edit', $term);
}

if (is_post()) {
  $term = sanitize($_POST['term']);
  $definition = sanitize($_POST['definition']);
  $original_term = sanitize($_POST['original-term']);

  if (empty($term) || empty($definition || empty($original_term))) {
    // TODO: display message
    echo "empty string";
  } else {
    Data::edit_term($original_term, $term, $definition);

    redirect("index.php");
  }
}
