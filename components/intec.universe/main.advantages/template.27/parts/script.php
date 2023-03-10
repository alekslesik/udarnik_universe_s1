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
        var theme = root.attr('data-theme');
        var tabs = $('[data-role="tabs"]', root);

        tabs.items = $('[data-role="tabs.item"]', tabs);
        tabs.content = $('[data-role="tabs.content.item"]', tabs);

        tabs.items.each(function () {
            var self = $(this);

            self.on('click', function () {
                var active = self.attr('data-active') === 'true';

                if (!active) {
                    var id = self.attr('data-id');
                    var showId = tabs.content.filter('[data-id="' + id + '"]');

                    tabs.items.attr('data-active', 'false')
                        .css('pointer-events', 'none');

                    self.attr('data-active', 'true');

                    if (theme !== 'black') {
                        tabs.items.removeClass('intec-cl-border')
                            .addClass('intec-cl-border-hover');

                        self.removeClass('intec-cl-border-hover')
                            .addClass('intec-cl-border');
                    }

                    tabs.content.attr('data-active', 'false');

                    setTimeout(function () {
                        tabs.content.css('display', 'none');
                        showId.css('display', 'block');

                        setTimeout(function () {
                            showId.attr('data-active', 'true');

                            setTimeout(function () {
                                tabs.items.css('pointer-events', '');
                            }, 310);
                        }, 15);
                    }, 305);
                }
            });
        });
    }, {
        'name': '[Component] intec.universe:main.advantages (template.27)',
        'nodes': <?= JavaScript::toObject('#'.$sTemplateId) ?>,
        'loader': {
            'name': 'lazy'
        }
    });
</script>