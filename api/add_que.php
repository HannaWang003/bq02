<?php
include_once "db.php";
$Que->save(['text' => $_POST['text'], 'big_id' => 0]);
$big_id = $Que->max('id');
foreach ($_POST['subtext'] as $text) {
    $Que->save(['text' => $text, 'big_id' => $big_id]);
}
to('../back.php?do=que');
