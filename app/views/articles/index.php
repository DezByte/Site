<?php
/**
 * @var \Dez\ORM\Collection\ModelCollection $articles
 * @var \SiteDezz\Model\Entity\Articles $article
 * @var \Dez\View\View $view
 * @var Mapper $mapper
 */
use Dez\Mvc\GridRouteMapper\Mapper;
?>

<a href="<?= $mapper->filter('id', Mapper::MAPPER_GREATER_THAN, 10)->url('articles/index') ?>">where > 10</a>
<br>
<a href="<?= $mapper->filter('id', Mapper::MAPPER_LESS_THAN, 10)->url('articles/index') ?>">where < 10</a>
<br>
<a href="<?= $mapper->filter('title', Mapper::MAPPER_LIKE, 'php')->url('articles/index') ?>">like php</a>
<br>

<a href="<?= $mapper->order('views', Mapper::MAPPER_ORDER_ASC)->url('articles/index') ?>">views asc</a>
<br>
<a href="<?= $mapper->order('views', Mapper::MAPPER_ORDER_DESC)->url('articles/index') ?>">views desc</a>
<br>


<?php foreach ($articles as $article): ?>
    <h2 class="article-h2">
        <a href="<?= $url->create('articles:item', [
            'article_id' => $article->id(),
            'slug' => $article->getSlug(),
        ]) ?>">
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

<div>
<?php
$view->set('pagination', $articles->getPagination());
$view->set('relativeUrl', $url->path('articles/index/%page%'));
echo $view->fetch('common/pagination');
?>
</div>
