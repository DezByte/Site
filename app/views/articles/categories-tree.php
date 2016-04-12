<?php

function nestedCategory($items = [], $level = 0, $url){

    /**
     * @var $url \Dez\Url\Url
     */

    $content = "<ul>";

    foreach($items as $id => $item) {
        $content .= "<li><a href=". ( $url->path('articles/category/'. $item['id'] .'/'. $item['slug']) ) .">{$item['title']}</a></li>";
        if(isset($item['children'])) {
            $content .= PHP_EOL . nestedCategory($item['children'], $level + 1, $url);
        }
    }

    return $content . "</ul>";
}

?>
<h2>Все категории сайта</h2>
<?= nestedCategory($tree, 0, $url) ?>
