<style>
    .item {
        border: 1px solid #000;
        padding: 2px 5px;
        margin-left: -1px;
        background: #eee;
    }

    .list {
        border: 1px solid #000;
        padding: 10px;
        margin-top: -1px;
    }

    .active {
        background: #fff;
        border-bottom: #fff;
    }
</style>
<div style="display:flex;margin-left:1px;">
    <div class="item active"><?= $Item->find(1)['type'] ?></div>
    <div class="item"><?= $Item->find(2)['type'] ?></div>
    <div class="item"><?= $Item->find(3)['type'] ?></div>
    <div class="item"><?= $Item->find(4)['type'] ?></div>
</div>
<div>
    <div class="list" style="display:show">
        <h1><?= $Item->find(1)['type'] ?></h1>
        <pre><?= $News->find(1)['text'] ?></div>
    <div class="list" style="display:none">
    <h1><?= $Item->find(2)['type'] ?></h1>
    <pre><?= $News->find(2)['text'] ?></pre>
    </div>
    <div class="list" style="display:none">
        <h1><?= $Item->find(3)['type'] ?></h1>
        <pre><?= $News->find(3)['text'] ?></pre>
    </div>
    <div class="list" style="display:none">
        <h1><?= $Item->find(4)['type'] ?></h1>
        <pre><?= $News->find(4)['text'] ?></pre>
    </div>
</div>
<pre>
<script>
$('.item').on('click', function() {
    $('.list').hide();
    $('.item').removeClass('active');
    let idx = $(this).index();
    console.log(idx)
    $(this).addClass('active');
    $('.list').eq(idx).show();
})
</script>