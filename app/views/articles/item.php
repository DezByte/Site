<?php
/** @var \SiteDezz\Model\Entity\Articles $article */
?>
<h2><?= $article->getTitle(); ?></h2>
<h4>
    <a href="<?= $url->path("articles/category/{$article->category()->id()}/{$article->category()->getSlug()}"); ?>"><?= $article->category()->getTitle(); ?></a>
</h4>
<div>
    <i><?= $article->getCreatedAt(); ?></i>
</div>
<p>
    <?= $article->getContent(); ?>
</p>
<?php foreach ($article->xrefs() as $xref): ?>
    <a href="<?= $url->path("articles/tag/{$xref->tag()->id()}/{$xref->tag()->getTag()}"); ?>"><?= $xref->tag()->getName(); ?></a>&nbsp;&bull;&nbsp;
<?php endforeach; ?>
<hr>
<h2>Комментарии</h2>
discus here