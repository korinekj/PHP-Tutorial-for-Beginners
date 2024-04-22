<?php
require('./app/app.php');

$view_bag = [
  'title' => 'Glosary list',
  'heading' => 'Glosary'
];

if (isset($_GET['search'])) {
  //If statements do NOT have their own variable scope. This is a common “gotcha” in PHP because it is easy to assume that all code blocks set up their own variable scope. This is not the case with if/else statements.
  //---
  //PROTO MŮŽU $ITEMS POUŽÍT MIMO IF STATEMENT
  $items = Data::search_terms($_GET['search']);
} else {
  $items = Data::get_terms();
}

view('index', $items);
