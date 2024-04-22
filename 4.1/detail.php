<?php
require('./app/app.php');

if (!isset($_GET['term'])) {
  redirect("index.php");
}

$data = Data::get_term($_GET['term']); // TODO: Validate

if ($data == false) {
  view('not_found', '');
  die();
}

$term = $data->term;

$view_bag = [
  'title' => "$term"
];

view('detail', $data);
