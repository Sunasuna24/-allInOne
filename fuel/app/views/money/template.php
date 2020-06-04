<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <title><?php echo $title; ?> | Money</title>
    <?php echo Asset::css('money/template.css'); ?>
</head>
<body>
    <header>
        <div class="header">
            <h2><a href="./top">MyMoney</a></h2>
            <ul>
                <li><a href="./top">Top</a></li>
                <li><a href="./data">Data</a></li>
                <li><a href="./record">Record</a></li>
                <li><a href="./edit">Edit</a></li>
            </ul>
        </div>
    </header>
    <main>
        <?php echo $content; ?>
        <?php echo $title; ?>
        <p>こんにちは、<?php echo $username; ?>さん</p>
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>MyMoney</h2>
                    <p>アプリ版のダウンロードはこちら</p>
                    <div>
                        <img src="" alt="iOS版のMyMoney">
                        <img src="" alt="Android版のMyMoney">
                    </div>
                </div>
                <div class="col-md-2">
                    <h3>サービス</h3>
                    <ul>
                        <li><a href="">メニュー一覧</a></li>
                        <li><a href="">有料会員プラン</a></li>
                        <li><a href="">一文無し会員プラン</a></li>
                        <li><a href="">ダッシュボード</a></li>
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li><a href="">ヘルプ</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h3>サポート</h3>
                    <ul>
                        <li><a href="">運営会社</a></li>
                        <li><a href="">採用情報</a></li>
                        <li><a href="">利用規約</a></li>
                        <li><a href="">法人プラン利用規約</a></li>
                        <li><a href="">特定商取引法に基づく表示</a></li>
                        <li><a href="">プライバシー</a></li>
                    </ul>
                    <h3>SNS</h3>
                    <ul>
                        <li><a href="">Facebook</a></li>
                        <li><a href="">Twitter</a></li>
                        <li><a href="">Instagram</a></li>
                        <li><a href="">Tik Tok</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>法人向けサービス</h3>
                    <p>収入と支出のバランスが視覚で分かる、お金持ちのお客様向けのプランです。</p>
                </div>
            </div>
            <div>
                <p>&copy 砂川朝恭</p>
            </div>
        </div>
        <a href="../welcome/index">Go to super top.</a>
    </footer>
</body>
</html>