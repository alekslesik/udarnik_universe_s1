<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="-img">
    <div class="my-flex-box">
        <?= $arDescription['VALUE'] ?>
    </div>
    <div class="my-flex-box">
        <?= $arSection["UF_TABLE"] ?>
    </div>
</div>

<style>
    /* Made by cssworld.ru */
    .-img {
        display: flex;
        justify-content: center;
        background-color: #393c4b;
        color: #ffffff;
        margin-top: 80px;
        padding-bottom: 80px;
        width: 107%;
    }

    .-img::after {
        height: 420px;
    }

    .my-flex-box {
        flex: 0 1 auto;
    }

    .my-flex-box:nth-child(1) {
        flex: 0 1 65%;
        margin-right: 40px;
        margin-top: 80px;
    }

    .my-flex-box:nth-child(2) {
        flex: 1 1 35%;
        margin-left: 40px;
        margin-top: 80px;
    }

    /* Стили таблицы (IKSWEB) */
    table.iksweb {
        text-decoration: none;
        border-collapse: collapse;
        width: 77%;
    }

    table.iksweb th {
        font-weight: 700;
        font-size: 16px;
        color: #7cc842;
    }

    table.iksweb td {
        font-size: 14px;
    }

    table.iksweb td,
    table.iksweb th {
        border-bottom: 1px solid dimgray;
        ;
        /* text-align: left; */
        height: 36px;
    }

    table.iksweb td:nth-child(2n) {
        color: #7cc842 !important;
        font-weight: 700;
        text-align: right;
    }

    @media (max-width: 720px) {

        .my-flex-box:nth-child(1) {
            flex: 0 1 65%;
            margin-right: 40px;
            margin-top: 40px;
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