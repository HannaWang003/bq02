<?php
include_once "db.php";
$res = $User->count(['email' => $_POST['email']]);
if ($res >= 1) {
    echo "您的密碼為:" . $User->find(['email' => $_POST['email']])['pw'];
} else {
    echo "查無此資料";
}
