<?php
include_once "db.php";
$sub = $Que->find($_POST['vote']);
$sub['vote']++;
$Que->save($sub);
$big_id = $sub['big_id'];
$big = $Que->find($big_id);
$big['vote']++;
$Que->save($big);
to("../index.php?do=result&id=$big_id");
