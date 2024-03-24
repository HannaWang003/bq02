<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/del.php" method="post">
        <table style="margin:auto;width:80%;">
            <tr>
                <th>帳號</th>
                <th>密碼</th>
                <th>刪除</th>
            </tr>
            <?php
            $rows = $User->all();
            foreach ($rows as $row) {
            ?>
                <tr>
                    <td class='ct'><?= $row['acc'] ?></td>
                    <td class='ct'><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
                    <td class='ct'><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
                </tr>
            <?php
            }

            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除"><input type="reset" value="清空選取">
        </div>
    </form>
    <form action="">
        <h1>新增會員</h1>
        <p style="color:red">*請設定您要註冊的帳號及密碼( 最長12個字元 )</p>
        <table>
            <tr>
                <td>Step1:登入帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>Step2:登入密碼</td>
                <td><input type="password" name="pw" id="pw" maxlength=12></td>
            </tr>
            <tr>
                <td>Step3:再次確認密碼</td>
                <td><input type="password" name="pw2" id="pw2" maxlength=12></td>
            </tr>
            <tr>
                <td>Step4:信箱(忘記密碼時使用)</td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="button" value="新增"><input type="reset" value="清除">
                </td>
                <!-- <td></td> -->
            </tr>
        </table>
    </form>
</fieldset>
<script>
    $('input[value=新增]').on('click', function() {
        let pw = $('#pw').val();
        let pw2 = $('#pw2').val();
        let acc = $('#acc').val();
        let email = $('#email').val();
        if (pw != "" && pw2 != "" && acc != "" && email != "") {
            if (pw != pw2) {
                alert('密碼錯誤')
            } else {
                $.post('./api/reg.php', {
                    acc,
                    pw,
                    email
                }, function(res) {
                    console.log(res);
                    switch (res) {
                        case "0":
                            alert('新增成功');
                            location.reload();
                            break;
                        case "1":
                            alert('帳號重覆，請重新輸入');
                            break;
                    }
                })
            }
        } else {
            alert("不可空白");
        }
    })
</script>