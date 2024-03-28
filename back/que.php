<fieldset>
    <form action="./api/add_que.php" method="post">
        <legend>新增問卷</legend>
        <div><span>問卷名稱</span><input type="text" name="text" id=""></div>
        <div id="sub">
            <div><span>選項</span><input type="text" name="subtext[]"><input type="button" onclick="more()" value="更多">
            </div>
        </div>
        <div><input type="submit" value="新增">|<input type="reset" value="清空"></div>
    </form>
</fieldset>
<script>
    function more() {
        let html = `
<div><span>選項</span><input type="text" name="subtext[]"></div>
`
        $('#sub').append(html);
    }
</script>