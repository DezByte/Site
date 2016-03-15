<?php
/**
 * @var \SiteDezz\Model\Entity\Articles $article
 * @var \SiteDezz\Model\Entity\Articles[] $parentCategories
 */
?>
<h2><?= $article->getTitle(); ?></h2>
<h4>
    <?php foreach ($parentCategories as $parentCategory): ?>
        <a href="<?= $url->path("articles/category/{$parentCategory->id()}/{$parentCategory->getSlug()}"); ?>"><?= $parentCategory->getTitle(); ?></a>&nbsp;떇&nbsp;
    <?php endforeach; ?>
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