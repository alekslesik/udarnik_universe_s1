<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\StringHelper;
use intec\template\Properties;

/**
 * @var array $arResult
 * @var array $arParams
 */

$arParams = ArrayHelper::merge([
    'PROPERTY_PRICE' => null,
    'PROPERTY_PRICE_OLD' => null,
    'TEMPLATE_VIEW' => 'mosaic',
    'COLUMNS' => 3,
    'PRICE_SHOW' => 'N',
    'PRICE_OLD_SHOW' => 'N',
    'PROPERTY_CURRENCY' => null,
    'PROPERTY_FORMAT' => null,
    'PROPERTY_FORMAT_USE' => 'N',
    'BUTTON_SHOW' => 'N',
    'BUTTON_TYPE' => 'detail',
    'BUTTON_FORM_ID' => null,
    'FORM_FIELD' => null,
    'FORM_TEMPLATE' => '.default',
    'FORM_TITLE' => null,
    'CONSENT_URL' => null,
    'BUTTON_TEXT' => null,
    'LAZYLOAD_USE' => 'N',
    'SETTINGS_USE' => 'N',
    'FOOTER_SHOW' => 'N',
    'FOOTER_POSITION' => 'center',
    'FOOTER_BUTTON_SHOW' => 'N',
    'FOOTER_BUTTON_TEXT' => null
], $arParams);

$arMacros = [
    'SITE_DIR' => SITE_DIR,
    'SITE_TEMPLATE_PATH' => SITE_TEMPLATE_PATH.'/',
    'TEMPLATE_PATH' => $this->GetFolder().'/'
];

if ($arParams['SETTINGS_USE'] === 'Y')
    include(__DIR__.'/modifiers/settings.php');

$arVisual = [
    'VIEW' => ArrayHelper::fromRange(['mosaic', 'blocks'], $arParams['TEMPLATE_VIEW']),
    'COLUMNS' => ArrayHelper::fromRange([2, 3], $arParams['COLUMNS']),
    'PRICE' => [
        'SHOW' => $arParams['PRICE_SHOW'] === 'Y'
    ],
    'PRICE_OLD' => [
        'SHOW' => $arParams['PRICE_OLD_SHOW'] === 'Y'
    ],
    'BUTTON' => [
        'SHOW' => $arParams['BUTTON_SHOW'] === 'Y',
        'TYPE' => ArrayHelper::fromRange(['detail', 'order'], $arParams['BUTTON_TYPE']),
        'TEXT' => $arParams['BUTTON_TEXT'],
    ],
    'LAZYLOAD' => [
        'USE' => $arParams['LAZYLOAD_USE'] === 'Y',
        'STUB' => null
    ],
    'FORM' => [
        'USE' => false,
        'ID' => $arParams['BUTTON_FORM_ID'],
        'FIELD' => $arParams['FORM_FIELD'],
        'TEMPLATE' => $arParams['FORM_TEMPLATE'],
        'TITLE' => $arParams['FORM_TITLE'],
        'CONSENT' => $arParams['CONSENT_URL']
    ]
];

if (defined('EDITOR'))
    $arVisual['LAZYLOAD']['USE'] = false;

if ($arVisual['LAZYLOAD']['USE'])
    $arVisual['LAZYLOAD']['STUB'] = Properties::get('template-images-lazyload-stub');

if ($arVisual['BUTTON']['SHOW'] && empty($arVisual['BUTTON']['TEXT']))
    $arVisual['BUTTON']['SHOW'] = false;

if (!empty($arVisual['FORM']['ID']) && !empty($arVisual['FORM']['FIELD']) && !empty($arVisual['FORM']['TEMPLATE']))
    $arVisual['FORM']['USE'] = true;

if (!empty($arVisual['FORM']['CONSENT']))
    $arVisual['FORM']['CONSENT'] = StringHelper::replaceMacros($arVisual['FORM']['CONSENT'], $arMacros);

$arResult['VISUAL'] = ArrayHelper::merge($arVisual, $arResult['VISUAL']);

unset($arVisual);

$arFooter = [
    'SHOW' => $arParams['FOOTER_SHOW'] === 'Y',
    'POSITION' => ArrayHelper::fromRange([
        'left',
        'center',
        'right'
    ], $arParams['FOOTER_POSITION']),
    'BUTTON' => [
        'SHOW' => $arParams['FOOTER_BUTTON_SHOW'] === 'Y',
        'TEXT' => $arParams['FOOTER_BUTTON_TEXT'],
        'LINK' => null
    ]
];

if (!empty($arParams['LIST_PAGE_URL']))
    $arFooter['BUTTON']['LINK'] = StringHelper::replaceMacros(
        $arParams['LIST_PAGE_URL'],
        $arMacros
    );

if (empty($arFooter['BUTTON']['TEXT']) || empty($arFooter['BUTTON']['LINK']))
    $arFooter['BUTTON']['SHOW'] = false;

if (!$arFooter['BUTTON']['SHOW'])
    $arFooter['SHOW'] = false;

$arResult['BLOCKS']['FOOTER'] = $arFooter;

unset($arFooter, $arMacros);

foreach ($arResult['ITEMS'] as &$arItem) {
    $arItem['DATA'] = [
        'PRICE' => [
            'BASE' => null,
            'OLD' => null
        ]
    ];

    $arItem['DATA']['PRICE']['BASE'] = null;
    $arItem['DATA']['PRICE']['OLD'] = null;

    $arPrice = [
        'PRICE_VALUE' => ArrayHelper::getValue($arItem, ['PROPERTIES', $arParams['PROPERTY_PRICE'], 'VALUE']),
        'PRICE_OLD_VALUE' => ArrayHelper::getValue($arItem, ['PROPERTIES', $arParams['PROPERTY_PRICE_OLD'], 'VALUE']),
        'PRICE_CURRENCY' => $arItem['PROPERTIES']['CURRENCY']['VALUE'],
        'PRICE_FORMAT' => null
    ];

    if(!empty($arPrice['PRICE_VALUE']))
        $arPrice['PRICE_VALUE'] = number_format($arPrice['PRICE_VALUE'], 0, '', ' ');
    if(!empty($arPrice['PRICE_OLD_VALUE']))
        $arPrice['PRICE_OLD_VALUE'] = number_format($arPrice['PRICE_OLD_VALUE'], 0, '', ' ');

    if($arParams['PROPERTY_FORMAT_USE'] === 'Y') {

        $arPrice['PRICE_FORMAT'] = $arItem['PROPERTIES']['PRICE_FORMAT']['VALUE'];

        if(!empty($arPrice['PRICE_VALUE']))
            $arItem['DATA']['PRICE']['BASE'] = trim(StringHelper::replaceMacros(
                $arPrice['PRICE_FORMAT'], [
                    'VALUE' => $arPrice['PRICE_VALUE'],
                    'CURRENCY' => $arPrice['PRICE_CURRENCY']
                ]
            ));
        if(!empty($arPrice['PRICE_OLD_VALUE']))
            $arItem['DATA']['PRICE']['OLD'] = trim(StringHelper::replaceMacros(
                $arPrice['PRICE_FORMAT'], [
                    'VALUE' => $arPrice['PRICE_OLD_VALUE'],
                    'CURRENCY' => $arPrice['PRICE_CURRENCY']
                ]
            ));

    } else{
        if(!empty($arPrice['PRICE_VALUE']))
            $arItem['DATA']['PRICE']['BASE'] = trim(StringHelper::replaceMacros(
                '#VALUE# #CURRENCY#', [
                    'VALUE' => $arPrice['PRICE_VALUE'],
                    'CURRENCY' => $arPrice['PRICE_CURRENCY']
                ]
            ));
        if(!empty($arPrice['PRICE_OLD_VALUE']))
            $arItem['DATA']['PRICE']['OLD'] = trim(StringHelper::replaceMacros(
                '#VALUE# #CURRENCY#', [
                    'VALUE' => $arPrice['PRICE_OLD_VALUE'],
                    'CURRENCY' => $arPrice['PRICE_CURRENCY']
                ]
            ));
    }

}





unset($arItem, $hSetPropertyText);