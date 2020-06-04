<p>以下を選択して、入力を続けてください。</p>
<div>
    <ul>
        <li><button id="in">入金する</button></li>
        <li><button id="out">出金する</button></li>
    </ul>
</div>

<div id="income" style="display: none;">
<p>------------------------------</p>
    <h1>入金フォーム</h1>
    <form action="./result" method="post">
        <h3>日時</h3>
            <input type="date" name="in_date" id="" value="<?php echo date('Y-m-d'); ?>" required>
        <h3>金額</h3>
            <input type="number" name="in_price" id="" required>
        <h3>分類</h3>
            <?php foreach ($income as $i): ?>
                <input type="radio" name="in_category" id="" value="<?php echo $i['category'] ?>"><?php echo $i['category'] ?>
            <?php endforeach; ?>
        <h3>メモ</h3>
            <input type="text" name="in_memo" id="">
        <input type="submit" name="income" value="送信する">
    </form>
</div>

<div id="outcome" style="display: none;">
    <p>------------------------------</p>
    <h1>出金フォーム</h1>
    <form action="./result" method="post">
        <h3>日時</h3>
            <input type="date" name="out_date" id="" value="<?php echo date('Y-m-d'); ?>" required>
        <h3>金額</h3>
            <input type="number" name="out_price" id="" required>
        <h3>分類</h3>
            <?php foreach ($outcome as $i): ?>
                <input type="radio" name="out_category" id="" value="<?php echo $i['category'] ?>"><?php echo $i['category'] ?>
            <?php endforeach; ?>
        <h3>メモ</h3>
            <input type="text" name="out_memo" id="">
        <input type="submit" name="outcome" value="送信する">
    </form>
</div>

<script>
    'use strict';
    {
        const incomeFunction = document.getElementById('income');
        const outcomeFunction = document.getElementById('outcome');

        
        document.getElementById('in').onclick = function() {
            incomeFunction.style.display = 'block';
            outcomeFunction.style.display = 'none';
        }

        document.getElementById('out').onclick = function() {
            incomeFunction.style.display = 'none';
            outcomeFunction.style.display = 'block';
        }
    }
</script>