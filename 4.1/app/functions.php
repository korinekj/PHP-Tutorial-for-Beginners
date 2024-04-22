<?php

function view($name, $model = '') {
  global $view_bag;

  require(APP_PATH . 'views/layout.view.php');
}

function redirect($url) {
  header("Location: $url");
  die();
}

function is_get() {
  return $_SERVER['REQUEST_METHOD'] === "GET";
}

function is_post() {
  return $_SERVER['REQUEST_METHOD'] === "POST";
}

function sanitize($value) {
  $data = htmlspecialchars(stripslashes(trim($value)));
  return $data;
}

// LOGIN FUNCTIONS

function authenticate_user($email, $password) {
  return $email == key(CONFIG['users']) && $password == current(CONFIG['users']);
}

function is_user_authenticated() {
  return isset($_SESSION['email']);
}

function ensure_user_is_authenticated() {
  if (!is_user_authenticated()) {
    redirect('/4.1/');
    die();
  }
}
