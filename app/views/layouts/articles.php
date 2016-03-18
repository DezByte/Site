<?php
/**
 * @var $this \Dez\View\Engine
*/

if(! $this->isSection('title')) {
    $this->setSection('title', 'Статьи');
}
?>
<div>
    <?= $this->section( 'content' ); ?>
</div>