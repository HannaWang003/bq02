<?php
include_once "db.php";
if ($User->count(['acc' => $_POST['acc'], 'pw' => $_POST['pw']]) >= 1) {
    if ($_POST['acc'] == "admin") {
        echo "3";
    } else {
        echo "0";
    }
    $_SESSION['user'] = $_POST['acc'];
} else {
    if ($User->count(['acc' => $_POST['acc']]) <= 0) {
        echo "1";
    } else {
        echo "2";
    }
}
