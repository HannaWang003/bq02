<form action="">
    <fieldset>
        <legend>會員註冊</legend>
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
                    <input type="button" value="註冊"><input type="reset" value="清除">
                </td>
                <!-- <td></td> -->
            </tr>
        </table>
    </fieldset>
</form>
<script>
    $('input[value=註冊]').on('click', function() {
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
                            alert('註冊成功，請重新登入');
                            location.href = "?do=login";
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