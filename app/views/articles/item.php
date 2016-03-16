<?php
/**
 * @var \SiteDezz\Model\Entity\Articles $article
 * @var \SiteDezz\Model\Entity\Articles[] $parentCategories
 */
?>
<h2><?= $article->getTitle(); ?></h2>

<span class="article-category-text">
<?php $size = $parentCategories->count(); foreach ($parentCategories as $i => $parentCategory): ?>
<?php
    $separator = ($size > $i + 1 ? "&nbsp;»&nbsp;" : null);
?>
    <a href="<?= $url->path("articles/category/{$parentCategory->id()}/{$parentCategory->getSlug()}"); ?>"><?= $parentCategory->getTitle(); ?></a>
    <?= $separator; ?>
<?php endforeach; ?>
</span>

<div class="article-created-text">
    <i><?= $article->getCreatedAt(); ?></i>
</div>

<p>
    <?= $article->getContent(); ?>
</p>

<div class="article-tags">
    <?php $size = $article->xrefs()->count(); foreach ($article->xrefs() as $i => $xref): ?>
        <?php
        $link = $url->path("articles/tag/{$xref->tag()->id()}/{$xref->tag()->getTag()}");
        $separator = ($size > $i + 1 ? "&nbsp;&bull;&nbsp;" : null);
        ?>
        <a href="<?= $link ?>"><?= $xref->tag()->getName(); ?></a><?= $separator; ?>
    <?php endforeach; ?>
</div>