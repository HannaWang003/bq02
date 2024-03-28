<?php
$title = $Que->find($_GET['id'])['text'];
$rows = $Que->all(['big_id' => $_GET['id']]);
?>
<form action="./api/vote.php" method="post">
    <fieldset>
        <legend>目前位置:首頁 > 問卷調查 > <?= $title ?></legend>
        <b><?= $title ?></b>
        <?php
    foreach ($rows as $row) {
    ?>
        <div><input type="radio" name="vote" value="<?= $row['id'] ?>"><?= $row['text'] ?></div>
        <?php
    }
    ?>
        <div class="ct"><button>我要投票</button></div>
    </fieldset>
</form>