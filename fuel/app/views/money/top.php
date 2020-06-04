<?php echo Asset::css('money/top.css'); ?>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url(../assets/img/water.jpg);">
            <div class="swiper-text">
                <h3 style="font-weight: lighter;">Walking City</h3>
                <p>You can see the city through the puddle.</p>
            </div>
        </div>
        <div class="swiper-slide" style="background-image: url(../assets/img/moutain-bike.jpeg);">
            <div class="swiper-text">
                <h3>Big Ocean</h3>
                <p>Okinawa in spring is quite cold, did you know?</p>
            </div>
        </div>
        <div class="swiper-slide" style="background-image: url(../assets/img/orange-backpack.jpeg);">
            <div class="swiper-text">
                <h3>Green Forest</h3>
                <p>I think he doesn't need the sunglass.</p>
            </div>
        </div>
        <div class="swiper-slide" style="background-image: url(../assets/img/aircraft.jpeg);">
            <div class="swiper-text">
                <h3>Red and Blue Sky</h3>
                <p>Bye, bye, airplane.</p>
            </div>
        </div>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
</div>
<div class="strong-list">
    <div>
        <h2>簡潔で力強い文章。</h2>
        <p>ここにはシンプルで、このWebアプリケーションの利点を説明する文章が入ります。また大体は、この続きには3つのポイントが列挙されることが多いです。</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <h3>簡単な操作</h3>
                <p>簡単かつ直感的な操作方法でユーザーを選びません。利便的でなめらかな体験をすぐに感じることができるでしょう。</p>
            </div>
            <div class="col-md-6 col-lg-4">
                <h3>シンプルなデザイン</h3>
                <p>洗練されたデザインをアプリケーションに施しました。これによってユーザーに見やすく、また使いたいと思わせることができます。</p>
            </div>
            <div class="col-md-6 col-lg-4">
                <h3>複数のアプリケーション</h3>
                <p>単一の機能ではなく、複数のアプリケーションを持つサイトに仕上がりました。複数のアプリを同一のサイトから確認できます。</p>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<script>
    var mySwiper = new Swiper('.swiper-container', {
        speed: 600,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        }
    });
</script>