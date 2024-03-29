<?php
include_once "db.php";
if ($_GET['g'] == 0) {
    $Log->del(['news' => $_GET['id'], 'acc' => $_SESSION['user']]);
    $news = $News->find($_GET['id']);
    $news['good']--;
    $News->save($news);
} else {
    $Log->save(['news' => $_GET['id'], 'acc' => $_SESSION['user']]);
    $news = $News->find($_GET['id']);
    $news['good']++;
    $News->save($news);
}
to('../index.php?do=pop');
