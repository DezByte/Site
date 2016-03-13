<?php

function nestedOptions($items = [], $level = 0) {
    $content = null;

    foreach($items as $id => $item) {
        $content .= '<option value="'. $id .'">'. (str_repeat('-', $level) .' '. $item['title'] . '('. $item['slug'] .')') .'</option>';
        if(isset($item['children'])) {
            $content .= PHP_EOL . nestedOptions($item['children'], $level + 1);
        }
    }

    return $content;
}

?>
<h2>Управление категориями</h2>
<fieldset>
    <form action="<?= $url->path('articles/edit-category') ?>" method="post">

        <p>
            <label for="title">Заголовок:</label>
            <input class="w100p" name="title" id="title" value="<?= $request->getPost('title') ?>" type="text"/>
        </p>

        <p>
            <label for="category">Родительская:</label>
            <select class="w100p" name="parent_id" id="category" size="10">
                <?= nestedOptions($categoriesTree); ?>
            </select>
        </p>

        <p>
            <input class="formbutton" value="Добавить" type="submit"/>
        </p>

    </form>
</fieldset>