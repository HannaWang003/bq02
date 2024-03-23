<?php
include_once "db.php";
$rows = $News->all(['type' => $_POST['type']]);
$article = "";
$content = "";
foreach ($rows as $idx => $row) {
    $article .= "<div class='article' data-content='$idx'>{$row['title']}</div>";
    $content .= "<pre class='content' id='content$idx' style='display:none'>{$row['text']}</pre>";
}
$tmp = [
    $article,
    $content
];
echo json_encode($tmp);
