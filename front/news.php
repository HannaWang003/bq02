<style>
    th,
    td {
        padding: 5px 10px;
    }

    td {
        vertical-align: top;
    }
</style>
<fieldset>
    <legend id="breadcrumb">目前位置:首頁><?= $name[2] ?></legend>
    <table>
        <tr>
            <th width="30%;">標題</th>
            <th width="60%;">內容</th>
            <th width="10%;"></th>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = ($_GET['p']) ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td style="background:#eee"><?= $row['title'] ?></td>
                <td>
                    <div class="content"><?= mb_substr($row['text'], 0, 20) ?>...</div>
                    <div class="detail" style="display:none;"><?= $row['text'] ?></div>

                </td>
                <td>
                    <?php
                    if (isset($_SESSION['user'])) {
                        if (($Log->find(['news' => $row['id'], 'acc' => $_SESSION['user']])) > 0) {
                            echo "<a href='./api/goodnews.php?id={$row['id']}&g=0'>收回讚</a>";
                        } else {
                            echo "<a href='./api/goodnews.php?id={$row['id']}&g=1'>讚</a>";
                        }
                    }

                    ?>
                </td>
            </tr>
        <?php

        }
        ?>

    </table>
    <div>
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
</fieldset>
<script>
    $('.content').on('click', function() {
        $('.detail').hide();
        $('.content').show();
        $(this).hide();
        $(this).siblings('.detail').show()
    })
    $('.detail').on('click', function() {
        $('.detail').hide();
        $('.content').show();
    })
</script>