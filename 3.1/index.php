<?php
session_start();

require_once('./inc/config.php');
require_once('./inc/functions.php');

if (is_user_authenticated()) {
    redirect('admin.php');
    die();
}

// GET REQUEST
$category = filter_input(INPUT_GET, 'category', FILTER_VALIDATE_INT);
$limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);

if ($category == false) {
    $category = 1;
}

if ($limit == false) {
    $limit = 10;
}

// POST REQUEST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

    if (authenticate_user($email, $password)) {
        $_SESSION['email'] = $email;
        redirect('admin.php');
        die();
        //header('Location: admin.php');
    } else {
        echo "spatne prihlasovaci udaje";
    }

    if (!$email) {
        $status = "ZADEJ SPRAVNY EMAIL";
    };
}

include('./inc/header.php');


// if (isset($_POST['login'])) {
//     echo "zpracovani POST informaci z submit login";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
    <!-- <?= print_r(pluck($guitars, 'name')) ?> -->

    <h2>GET REQUEST</h2>
    <div>
        Category: <?= $category ?> LIMIT: <?= $limit ?>
    </div>

    <h2>POST REQUEST</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="text" name="email" id="email" />
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" type="password" name="password" id="password" />
        </div>
        <div class="from-group">
            <input type="submit" name="login" value="Login" />
        </div>
    </form>

    <?php if (isset($status)) {
        echo $status;
    } else echo isset($email) ?  $email : "";
    ?>

    <?php include('./inc/footer.php');
