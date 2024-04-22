<?php
session_start();

require("./app/app.php");

if (is_post()) {
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

  if (authenticate_user($email, $password)) {
    echo $email, $password;
    $_SESSION['email'] = $email;
    redirect('admin/');
    die();
    //header('Location: admin.php');
  } else {
    echo "spatne prihlasovaci udaje";
  }

  if (!$email) {
    $status = "ZADEJ SPRAVNY EMAIL";
  };
}

view("login");
