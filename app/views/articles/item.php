<?php
/** @var \SiteDezz\Model\Entity\Articles $article */
?>
<h2><?= $article->getTitle(); ?></h2>
<h4><?= $article->category()->getTitle(); ?></h4>
<div>
    <i><?= $article->getCreatedAt(); ?></i>
</div>
<p>
    <?= $article->getContent(); ?>
</p>
<hr>
<h2>Комментарии</h2>
disqus here