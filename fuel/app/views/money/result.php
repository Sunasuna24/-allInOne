<h1>結果です。</h1>
<div>
    <?php
    echo "<script type='text/javascript'>alert('正常に処理されました。');</script>";
    ?>
</div>
<?php if (Input::post('income')): ?>
    <div>
        <?php
            $date = date('Y/m/d', strtotime($in_date));
            echo $date."に".$in_category."から".$in_price."円の振り込みがありました。";
        ?>
    </div>
<?php elseif (Input::post('outcome')): ?>
    <div>
        <?php
            $date = date('Y/m/d', strtotime($out_date));
            echo $date."に".$out_category."で".$out_price."円使いました。";
        ?>
    </div>
<?php endif; ?>