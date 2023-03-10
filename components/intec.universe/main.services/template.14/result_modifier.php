<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Type;
use intec\core\helpers\StringHelper;

/**
 * @var array $arResult
 * @var array $arParams
 */

$arParams = ArrayHelper::merge([
    'PROPERTY_TEXT' => null,
    'PROPERTY_TEXT_SHOW' => 'N',
    'FOOTER_SHOW' => 'N',
    'FOOTER_POSITION' => 'center',
    'FOOTER_BUTTON_SHOW' => 'N',
    'FOOTER_BUTTON_TEXT' => null,
    'TABS_POSITION' => 'end'
], $arParams);

$arMacros = [
    'SITE_DIR' => SITE_DIR
];

$arVisual = [
    'PROPERTIES' => [
        'SHOW' => $arParams['PROPERTY_TEXT_SHOW'] === 'Y',
    ],
    'TABS' => [
        'POSITION' => ArrayHelper::fromRange(['start', 'left', 'end'], ArrayHelper::getValue($arParams, 'TABS_POSITION'))
    ]
];

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

unset($arFooter);

foreach ($arResult['ITEMS'] as &$arItem) {
    $arItem['DATA'] = [
        'PRICE' => null
    ];

    $arProperty = ArrayHelper::getValue($arItem, [
        'PROPERTIES',
        $arParams['PROPERTY_TEXT'][0]
    ]);

    if (!empty($arParams['PROPERTY_TEXT'])) {
        foreach ($arParams['PROPERTY_TEXT'] as $sProp) {
            $arProperty = ArrayHelper::getValue($arItem, [
                'PROPERTIES',
                $sProp,
                '~VALUE'
            ]);

            if (!empty($arProperty)) {
                if (Type::isArray($arProperty)) {
                    if (ArrayHelper::keyExists('TEXT', $arProperty))
                        $sText = $arProperty['TEXT'];
                    else
                        $sText = ArrayHelper::getFirstValue($arProperty);
                } else {
                    $sText = $arProperty;
                }

                if (!empty($sText))
                    $arItem['DATA']['TEXT'][] = StringHelper::replaceMacros(
                        $sText,
                        $arMacros
                    );
            }
        }
    }
}

unset($arItem, $arMacros);