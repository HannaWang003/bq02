<div>請輸入信箱以查詢密碼</div>
<input type="text" name="email" id="email" style="width:80%;">
<br>
<div id="result"></div>
<button id="searchBtn">尋找</button>
<script>
$('#searchBtn').on('click', function() {
    let email = $('#email').val();
    $.post('./api/forget.php', {
        email
    }, function(res) {
        $('#result').html(res);
    })
})
</script>