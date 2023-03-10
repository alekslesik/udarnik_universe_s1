<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="my-flex-cont-img">
    <div class="my-flex-box-img">
        <h1>
            <?= $arSection["UF_BANNER_HEADER"] ?>
        </h1>
        <ul>
            <li>
                <p>Ремонтируем все виды инструмента включая профессиональную технику.</p>
            </li>
            <li>
                <p>Полный комплекс работ: диагностика, обслуживание, ремонт, замена деталей.</p>
            </li>
            <li>
                <p>Гарантия на все выполненные работы и на все используемые запчасти.</p>
            </li>
        </ul>
    </div>
    <div class="my-flex-box-img">
        <? $sPicture = CFile::GetPath($arSection['PICTURE']); ?>
        <img src="<?= $sPicture ?>" alt="">
    </div>
</div>

<div class="my-flex-cont-icons">
    <div class="my-flex-box-icons my-flex-box-cash">
        <div class="my-flex-box-description">Наличные или карта для физичечких лиц.</div>
    </div>
    <div class="my-flex-box-icons my-flex-box-card">
        <div class="my-flex-box-description">Безналичная оплата для юридических лиц</div>
    </div>
    <div class="my-flex-box-icons">
        <img class="flex-social" src="/local/templates/universe_s1/icons/whatsapp.png" alt="">
        <img class="flex-social" src="/local/templates/universe_s1/icons/youtube.png" alt="">
        <img class="flex-social" src="/local/templates/universe_s1/icons/instagram.png" alt="">
    </div>
</div>

<!-- <hr class="hr-shelf"> -->

<style>
    #pagetitle {
        display: none;
    }

    h1 {
        font-size: 38px;
        font-weight: bold;
        position: relative;
        margin-bottom: 25px;
        margin-top: 0;
    }

    .my-flex-cont-icons {
        display: flex;
        justify-content: space-between;
        align-items: end;
        height: 65px;
        margin-bottom: 100px;
    }

    .my-flex-box-icons {
        flex: 0 1 auto;
    }

    .my-flex-box-icons:nth-child(1) {
        flex: 1 1 auto;
    }

    .my-flex-box-icons:nth-child(2) {
        flex: 1 1 auto;
    }

    .my-flex-box-icons:nth-child(3) {
        flex: 1 1 auto;
        text-align: center;
        /* width: 40%; */
    }

    .my-flex-box-icons:nth-child(3)>.fa-brands {
        margin: 0px 10px 0px 10px;
    }

    .my-flex-box-icons>.flex-social {
        margin: 0 10px 0 10px;
        width: 40px;
    }

    .fa-brands {
        font-size: 40px;
    }

    .my-flex-box-cash::before {
        content: url('/local/templates/universe_s1/icons/money.png');
        margin-right: 30px;
    }

    .my-flex-box-card::before {
        content: url('/local/templates/universe_s1/icons/money.png');
        margin-right: 30px
    }

    .my-flex-box-description {
        display: inline-block;
        max-width: 200px;
        font-weight: 500;
        font-size: 17px;
    }

    .hr-shelf {
        padding: 0;
        height: 40px;
        border: none;
        border-bottom: 1px solid #393c4b;
        /* box-shadow: 0 20px 20px -20px #393c4b; */
    }

    .my-flex-cont-img {
        font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        display: flex;
        justify-content: space-between;
        align-items: stretch;
        color: #393c4b;
    }

    .my-flex-box-img {
        flex: 0 1 auto;
        align-self: center;
        width: 25%;
    }

    .my-flex-box-img:nth-child(1) {
        flex: 2 1 auto;
    }

    .my-flex-box-img:nth-child(2) {}

    .my-flex-box-img img {
        max-width: 280px;
    }

    .my-flex-box-img li {
        font-size: 20px;
    }

    .my-flex-box-img li p {
        margin-left: 40px;
        width: 80%;
        font-size: 21px;
        line-height: 28px;
    }

    .my-flex-box-img li:before {
        content: url('/local/templates/universe_s1/icons/znak.png');
    }

    .my-flex-box-img h2 {
        margin-bottom: 50px;
        font-weight: 800;
        font-size: 30px;
    }

    @media (max-width: 720px) {

        .my-flex-box:nth-child(1) {
            flex: 0 1 65%;
            margin-right: 40px;
            margin-top: 80px;
        }

        .my-flex-box-img:nth-child(2) {
            display: none;
        }

        .my-flex-cont-icons {
            display: none;
        }

        .-img {
            flex-wrap: wrap;
            display: flex;
            justify-content: center;
            background-color: #393c4b;
            color: #ffffff;
            margin-top: 30px;
            padding-bottom: 50px;
            width: 100%;
        }

        .my-flex-box-img li p {
            width: 90%;
        }

        table.iksweb {
            text-decoration: none;
            border-collapse: collapse;
            width: auto;
        }

        .my-flex-box:nth-child(2) {
            margin-top: 80px;
            margin-left: 0;
            flex: auto;
            margin-left: 75px;
        }

        .-img::after {
            display: none;
        }
    }
</style>