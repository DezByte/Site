<?php
/**
 * @var \Dez\ORM\Collection\ModelCollection $articles
 * @var \SiteDezz\Model\Entity\Articles $article
 */

if($articles->count() > 0):

?>
<?php foreach ($articles as $article): ?>
    <h2 class="article-h2">
        <a href="<?= $url->path("{$article->id()}-{$article->getSlug()}") ?>">
            <?= $article->getTitle(); ?>
        </a>
    </h2>

    <h5 class="article-category-text">
        <?= $article->category()->getTitle(); ?>
    </h5>

    <div class="article-created-text">
        <i><?= $article->getCreatedAt(); ?></i>
    </div>

    <div class="article-short">
        <?= $article->shortContent(100); ?>...
    </div>

    <div class="article-tags">
<?php $size = $article->xrefs()->count(); foreach ($article->xrefs() as $i => $xref):?>
<?php
    $link = $url->path("articles/tag/{$xref->tag()->id()}/{$xref->tag()->getTag()}");
?>
    <a href="<?= $link; ?>"><?= $xref->tag()->getName(); ?></a>
    <?= ($size > $i + 1 ? "&nbsp;&bull;&nbsp;" : null); ?>
<?php endforeach; ?>
    </div>

<?php endforeach; ?>

<?php
$pagination = $article->getPagination();

else:

    echo "<i>No records found. Back to <a href=". $url->path('articles') .">main</a> list</i>";

endif;
?>