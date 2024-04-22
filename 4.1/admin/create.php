<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

if (is_post()) {
  $term = sanitize($_POST['term']);
  $definition = sanitize($_POST['definition']);

  echo $term, $definition;

  if (empty($term) || empty($definition)) {
    // TODO: display message
    echo "empty string";
  } else {
    Data::add_term($term, $definition);
    redirect("index.php");
  }
}

$view_bag = [
  'title' => 'Add new term and definition',
  'heading' => 'Create Term'
];

view('admin/create');
