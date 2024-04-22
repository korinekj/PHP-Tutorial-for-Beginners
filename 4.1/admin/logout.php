<?php
require("../app/app.php");

session_start();
session_unset();
session_destroy();

redirect("/4.1/");
