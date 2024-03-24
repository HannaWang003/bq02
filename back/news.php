<style>
    td {
        text-align: center;
    }
</style>
<form action="./api/news.php" method="post">
    <table style="width:100%;margin:auto;">
        <tr>
            <th>編號</th>
            <th>標題</th>
            <th>顯示</th>
            <th>刪除</th>
        </tr>
        <?php
        $total = $News->count();
        $div = 3;
        $pages = ceil($total / $div);
        $now = ($_GET['p']) ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all("limit $start,$div");
        foreach ($rows as $idx => $row) {
            $num = $start + 1 + $idx;
        ?>
            <tr>
                <td style="background:#eee"><?= $num ?>.</td>
                <td><?= $row['title'] ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? "checked" : "" ?>>
                </td>
                <td><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
            </tr>
            <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
        <?php
        }

        ?>

    </table>
    <div class="ct">
        <?php
        if (($now - 1) > 0) {
            $pre = $now - 1;
            echo "<a href='?do=news&p=$pre'> < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $style = ($now == $i) ? "style='font-size:20px;'" : "";
            echo "<a href='?do=news&p=$i' $style>$i</a>";
        }
        if (($now + 1) <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=news&p=$next'> > </a>";
        }
        ?>
    </div>
    <div class="ct">
        <input type="submit" value="確定修改">
    </div>
</form>