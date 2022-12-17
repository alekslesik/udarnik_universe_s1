<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<div class="-img">
    <div class="my-flex-box">
        <?= $arDescription['VALUE']?>
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

}

.my-flex-box {
    flex: 0 1 auto;
}

.my-flex-box:nth-child(1) {
    flex: 0 1 50%;
    margin-right: 40px;
    margin-top: 60px;
}

.my-flex-box:nth-child(2) {
    flex: 0 1 50%;
    margin-left: 40px;
    margin-top: 60px;
}

/* Стили таблицы (IKSWEB) */
table.iksweb {
    text-decoration: none;
    border-collapse: collapse;
    width: 100%;
    text-align: left;
}

table.iksweb th {
    font-weight: normal;
    font-size: 16px;
    color: #ffffff;
    background-color: #7cc842;
}

table.iksweb td {
    font-size: 14px;
    color: #000000;
}

table.iksweb td,
table.iksweb th {
    border: 1px solid #7cc842;
    text-align: left;
    height: 36px;
    padding: 0 0 0 20px;
}

table.iksweb tr:hover {
    background-color: #f9fafb
}

table.iksweb tr:hover td {
    color: #354251;
    cursor: default;
}
</style>