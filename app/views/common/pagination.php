<?php
/**
 * @var $pagination \Dez\ORM\Common\Pagi
 * @var $relativeUrl string
*/
?>
<div class="pagination">
    <?php for ($i = 0, $count = $pagination->getNumPages(); $i < $count; $i++): ?>
        <?php if($pagination->getCurrentPage() == $i + 1): ?>
            <span class="pagination-current-page"><?= $i + 1; ?></span>
        <?php else: ?>
            <a class="pagination-link-page" href="<?= str_replace('%page%', ($i + 1), $relativeUrl); ?>"><?= $i + 1; ?></a>
        <?php endif; ?>
    <?php endfor; ?>
</div>
