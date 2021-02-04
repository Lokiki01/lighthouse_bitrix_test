<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тестовое задание PHP");
?>

<style>
 .test-table td {
    border-width: 1px;
    padding: 4px;
    text-align: center;
 }
</style>

<?php

$iRows = 10;
$iColumns = 10;
$iBCount = 10;

$arA = array_fill(0, $iRows, array_fill(0, $iColumns, 0));

foreach ($arA as &$arValue) {
    foreach ($arValue as &$nValue) {
        $nValue = mt_rand(0, 100);
    }
}

unset($arValue, $nValue);

$arB = array_fill(0, $iBCount, 0);

foreach ($arB as &$nValue) {
    $nValue = mt_rand(0, 100);
}

unset($nValue);

?>

<h2> Таблица 1 </h2>
<table class="test-table">
    <?php foreach ($arA as $arRow) { ?>
        <tr>
            <?php foreach ($arRow as $nValue) { ?>
                <td>
                    <?= $nValue ?>
                </td>
            <?php } ?>        
        </tr>
    <?php } ?>
</table>

<?php

foreach ($arA as &$arValue) {
    foreach ($arValue as &$nValue) {
        $nNeedle = array_search($nValue, $arB);
        if ($nNeedle) {
            $nValue = $arB[$nNeedle];
        } else {
            $nValue = 'Нет';
        }
    }
}

unset($arValue, $nValue);

?>

<h2> Таблица 2 </h2>
<table class="test-table">
    <tr style="font-weight: 600;">
        <?php foreach ($arB as $nValue) { ?>
                <td>
                    <?= $nValue ?>
                </td>
            <?php } ?>    
        </tr>
    <?php foreach ($arA as $arRow) { ?>
        <tr>
            <?php foreach ($arRow as $nValue) { ?>
                <td>
                    <?= $nValue ?>
                </td>
            <?php } ?>        
        </tr>
    <?php } ?>
</table>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>