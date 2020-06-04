<?php echo @$respond; ?>
<p>編集ページです。</p>
<div>
    <ul>
        <li><button id="income">入金処理を編集する</button></li>
        <li><button id="outcome">出金処理を編集する</button></li>
    </ul>
</div>

<div id="a" style="display: none;">
    <p>入金の項目</p>
    <button id="add_in">新規追加</button>
    <button id="edit_in">既存の編集</button>
    <button id="delete_in">既存の削除</button>
    <div id="add_in_form" style="display: none;">
        <p>新規追加するお</p>
        <!-- 入金の新規 -->
        <form action="./edit" method="post">
            <p>新しい項目を記入してね。</p>
            <input type="text" name="in_add_name" id="">
            <br />色を選んでね。
            <input type="color" name="in_add_color" id="">
            <input type="submit" value="送信">
        </form>
    </div>
    <div id="edit_in_form" style="display: none;">
        <p>既存の編集をするお</p>
        <!-- 入金の編集 -->
        <form action="./edit" method="post">
            <p>編集する項目を選んでね</p>
            <?php foreach ($income_category as $i): ?>
                <input type="radio" name="in_edit" id="" value="<?php echo $i['category']; ?>" required><?php echo $i['category']; ?>
            <?php endforeach; ?>
            <br /><input type="text" name="in_edit_name" id=""><br />
            <input type="submit" value="送信">
        </form>
    </div>
    <div id="delete_in_form" style="display: none;">
        <p>既存の削除ができる</p>
        <!-- 入金の削除 -->
        <form action="./edit" method="post">
            <p>削除する要素を選んでね</p>
            <?php foreach ($income_category as $i): ?>
                <input type="radio" name="in_delete" id="" value="<?php echo $i['category']; ?>" required><?php echo $i['category']; ?>
            <?php endforeach; ?>
            <input type="submit" value="送信">
        </form>
    </div>
</div>

<div id="b" style="display: none;">
    <p>出金の項目</p>
    <button id="new_out">新規追加</button>
    <button id="edit_out">既存の編集</button>
    <button id="delete_out">既存の削除</button>
    <div id="add_out_form" style="display: none;">
        <!-- 出金の新規 -->
        <p>支出の追加</p>
        <form action="./edit" method="post">
            <input type="text" name="out_add_name" id="">
            <br />色を選んでね。
            <input type="color" name="out_add_color" id="">
            <input type="submit" value="送信">
        </form>
    </div>
    <div id="edit_out_form" style="display: none;">
        <!-- 出金の既存 -->
        <p>支出の編集</p>
        <form action="./edit" method="post">
            <?php foreach ($outcome_category as $j): ?>
                <input type="radio" name="out_edit" id="" value="<?php echo $j['category']; ?>"><?php echo $j['category']; ?>
            <?php endforeach; ?>
            <br /><input type="text" name="out_edit_name" id=""><br />
            <input type="submit" value="送信する">
        </form>
    </div>
    <div id="delete_out_form" style="display: none;">
        <p>既存の削除ができる</p>
        <!-- 出金の削除 -->
        <form action="./edit" method="post">
            <p>削除する要素を選んでね</p>
            <?php foreach ($outcome_category as $i): ?>
                <input type="radio" name="out_delete" id="" value="<?php echo $i['category']; ?>" required><?php echo $i['category']; ?>
            <?php endforeach; ?>
            <input type="submit" value="送信">
        </form>
    </div>
</div>
<script>
    'use strict';
    {
        //入金の編集ボタン
        document.getElementById('income').onclick = function() {
            document.getElementById('a').style.display = 'block';
            document.getElementById('b').style.display = 'none';
        }

        //支出の編集ボタン
        document.getElementById('outcome').onclick = function() {
            document.getElementById('a').style.display = 'none';
            document.getElementById('b').style.display = 'block';
        }

        //入金の新規追加
        document.getElementById('add_in').onclick = function() {
            document.getElementById('add_in_form').style.display = 'block';
            document.getElementById('edit_in_form').style.display = 'none';
            document.getElementById('delete_in_form').style.display = 'none';
        }

        //入金の既存編集
        document.getElementById('edit_in').onclick = function() {
            document.getElementById('add_in_form').style.display = 'none';
            document.getElementById('edit_in_form').style.display = 'block';
            document.getElementById('delete_in_form').style.display = 'none';
        }

        //入金の削除
        document.getElementById('delete_in').onclick = function() {
            document.getElementById('add_in_form').style.display = 'none';
            document.getElementById('edit_in_form').style.display = 'none';
            document.getElementById('delete_in_form').style.display = 'block';
        }

        //支出の新規追加
        document.getElementById('new_out').onclick = function() {
            document.getElementById('add_out_form').style.display = 'block';
            document.getElementById('edit_out_form').style.display = 'none';
            document.getElementById('delete_out_form').style.display = 'none';
        }

        //支出の既存編集
        document.getElementById('edit_out').onclick = function() {
            document.getElementById('add_out_form').style.display = 'none';
            document.getElementById('edit_out_form').style.display = 'block';
            document.getElementById('delete_out_form').style.display = 'none';
        }

        //支出の削除
        document.getElementById('delete_out').onclick = function() {
            document.getElementById('add_out_form').style.display = 'none';
            document.getElementById('edit_out_form').style.display = 'none';
            document.getElementById('delete_out_form').style.display = 'block';
        }
    }
</script>