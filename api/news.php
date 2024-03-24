<?php
include_once "db.php";
foreach ($_POST['id'] as $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $News->del($id);
    } else {
        $row = $News->find($id);
        if (isset($_POST['sh']) && in_array($id, $_POST['sh'])) {
            $row['sh'] = 1;
        } else {
            $row['sh'] = 0;
        }
        $News->save($row);
    }
}
to('../back.php?do=news');
