<?php
$big = $Que->find($_GET['id']);
$subs = $Que->all(['big_id' => $_GET['id']]);
$bigvote = ($big['vote'] == 0) ? 1 : $big['vote'];
?>
<style>
    .d-inline-block {
        display: inline-block;
    }
</style>
<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查 > <?= $big['text'] ?></legend>
    <div><b><?= $big['text'] ?></b></div>
    <?php
    foreach ($subs as $id => $sub) {
        $width = ($sub['vote'] / $bigvote) * 300;
    ?>
        <div style="display:flex;align-items:center;"><span><?= $id + 1 ?></span>&nbsp;&nbsp;<span class="d-inline-block" style="width:350px"><?= $sub['text'] ?></span><span class="d-inline-block" style="height:20px;width:<?= $width ?>px;background-color: #eee;"></span><span><?= $sub['vote'] ?>票(<?= $width / 3 ?>%)</span>
        </div>
    <?php
    }
    ?>
    <div class="ct"><button onclick="location.href='?do=que'">返回</button></div>
</fieldset>