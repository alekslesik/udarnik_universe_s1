<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use intec\core\helpers\Html;
use intec\core\helpers\Type;

/**
 * @var array $arParams
 * @var array $arResult
 * @var array $arBlock
 */

?>
<div class="catalog-element-properties widget">
    <div class="catalog-element-properties-wrapper intec-content">
        <div class="catalog-element-properties-wrapper-2 intec-content-wrapper">
            <?php if (!empty($arBlock['HEADER']['VALUE'])) { ?>
                <div class="catalog-element-properties-header widget-header">
                    <?= Html::tag('div', $arBlock['HEADER']['VALUE'], [
                        'class' => [
                            'widget-title',
                            'align-'.$arBlock['HEADER']['POSITION']
                        ]
                    ]) ?>
                </div>
            <?php } ?>
            <div class="catalog-element-properties-table widget-content">
                <?php foreach ($arResult['DISPLAY_PROPERTIES'] as $arProperty) { ?>
                    <div class="catalog-element-property">
                        <div class="intec-grid intec-grid-a-v-stretch intec-grid-i-h-20 intec-grid-i-v-6 intec-grid-500-wrap">
                            <div class="catalog-element-property-name intec-grid-item-2 intec-grid-item-500-1">
                                <?= $arProperty['NAME'] ?>
                            </div>
                            <div class="catalog-element-property-value intec-grid-item-2 intec-grid-item-500-1">
                                <?= !Type::isArray($arProperty['DISPLAY_VALUE']) ?
                                    $arProperty['DISPLAY_VALUE'] :
                                    implode(', ', $arProperty['DISPLAY_VALUE'])
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>