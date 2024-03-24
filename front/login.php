<style>
a {
    text-decoration: none;
}
</style>
<form action="">
    <fieldset>
        <legend id="breadcrumb">會員登入</legend>
        <table style="width:50%;margin:auto">
            <tr>
                <td>帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td><input type="button" value="登入" id="loginBtn"><input type="reset" val="清除"></td>
                <td style="text-align:end;"><a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a></td>
            </tr>
        </table>
</form>
</fieldset>
<script>
$('#loginBtn').on('click', function() {
    // console.log($(this))
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    $.post('./api/login.php', {
        acc,
        pw
    }, function(res) {
        console.log(res)
        switch (res) {
            case "0":
                alert('歡迎登入');
                location.href = "?do=main";
                break;
            case "1":
                alert('查無帳號');
                $('input[type=text]').val("");
                $('input[type=password]').val("");
                break;
            case "2":
                alert('密碼錯誤')
                $('input[type=text]').val("");
                $('input[type=password]').val("");
                break;
            case "3":
                alert('歡迎登入');
                location.href = "./back.php";
                break;
        }
    })
})
</script>