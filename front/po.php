<div id="breadcrumb">目前位置:首頁><?= $name[1] ?> ><span id="nowpage"></span> </div>
<div style="display:flex;margin:auto">
    <div style="width:20%;border:1px solid #000;text-align:center;line-height:50px;">
        <div class="item" data-type="1"><?= $Item->find(1)['type'] ?></div>
        <div class="item" data-type="2"><?= $Item->find(2)['type'] ?></div>
        <div class="item" data-type="3"><?= $Item->find(3)['type'] ?></div>
        <div class="item" data-type="4"><?= $Item->find(4)['type'] ?></div>
    </div>
    <fieldset style="width:80%;">
        <legend>文章列表</legend>
        <div id="article"></div>
        <div id="content"></div>
    </fieldset>
</div>
<script>
getnews(1);

function getnews(type) {
    $.post('./api/getnews.php', {
        type
    }, function(res) {
        let data = JSON.parse(res);
        $('#article').html(data[0]);
        $('#content').html(data[1]);
    })
}
$('#nowpage').text('健康新知')
$('.item').on('click', function() {
    let text = $(this).text();
    $('#nowpage').text(text);
    let type = $(this).data('type');
    getnews(type)

})
$('#article').on('click', '.article', function() {
    $('.content').hide();
    $('.article').hide();
    let idx = $(this).data('content');
    $('#content' + idx).show();

})
</script>