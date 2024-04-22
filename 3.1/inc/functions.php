<?php
$name = "Jarda
je
borec";

$names = ["Jarda", "Karel", "John"];

$kvp_names = [
  "borec" => "Jarda",
  "tupec" => "Karel",
  "lupic" => "John",
];


function format($array) {
  echo "<pre>";
  print_r($array);
  echo "</pre>";
};

$guitars = [
  ["name" => "Vela", "manufacturer" => "PR"],
  ["name" => "Bela", "manufacturer" => "BRk"],
  ["name" => "Cela", "manufacturer" => "EWQ"],
];

// function pluck($arr, $key) {
//     foreach ($arr as $item) {
//         print_r($item[$key]);
//     };
// };

function pluck($arr, $key) {
  $value = "";
  $results = array_map(function ($item) use ($key) {
    return $item[$key];
  }, $arr);
  foreach ($results as $value) {
    echo "<h1>{$value}</h1>";
  };
}

function output($value /*= ''*/) {
  echo '<pre>';
  print_r($value);
  echo '</pre>';
}

function authenticate_user($email, $password) {
  return $email == USER_NAME && $password == PASSWORD;
}

function redirect($url) {
  return header("Location: {$url}");
}

function is_user_authenticated() {
  return isset($_SESSION['email']);
}

function ensure_user_is_authenticated() {
  if (!is_user_authenticated()) {
    redirect('/');
    die();
  }
}
