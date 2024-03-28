<fieldset>
    <legend id="breadcrumb">目前位置:首頁><?= $name[5] ?></legend>
    <table class="all" style="margin:auto">
        <tr>
            <th>編號</th>
            <th>問卷題目</th>
            <th>投票總數</th>
            <th>結果</th>
            <th>狀態</th>
        </tr>
        <?php
        $rows = $Que->all(['sh' => 1, 'big_id' => 0]);
        foreach ($rows as $idx => $row) {
        ?>
        <tr>
            <td><?= $idx + 1 ?></td>
            <td><?= $row['text'] ?></td>
            <td><?= $row['vote'] ?></td>
            <td><a href="?do=result&id=<?= $row['id'] ?>">結果</a></td>
            <td>
                <?= (!isset($_SESSION['user'])) ? "<a href='?do=login'>請先登入</a>" : "<a href='?do=vote&id={$row['id']}'>參與<br/>投票</a>" ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

</fieldset>