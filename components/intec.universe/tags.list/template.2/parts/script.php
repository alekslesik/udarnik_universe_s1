<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\JavaScript;

/**
 * @var string $sTemplateId
 */

?>
<script type="text/javascript">
    template.load(function (data) {
        var $ = this.getLibrary('$');
        var root = data.nodes;
        var form = $('[data-role="form"]', root);
        var container = $('[data-role="items"]', form);
        var items = $('[data-role="item"]', container);
        var locked = false;
        var descriptor = null;

        var submit = function () {
            if (descriptor !== null)
                clearTimeout(descriptor);

            descriptor = setTimeout(function () {
                locked = true;
                form.trigger('submit');
                items.find('input[type="checkbox"]').prop('disabled', true);
            }, 1000);
        };

        items.each(function () {
            var item = $(this);

            item.on('click', function () {
                if (locked)
                    return;

                submit();
            });
        });
    }, {
        'name': '[Component] intec.universe:tags.list (template.2)',
        'nodes': <?= JavaScript::toObject('#'.$sTemplateId) ?>,
        'loader': {
            'name': 'lazy'
        }
    });
</script>