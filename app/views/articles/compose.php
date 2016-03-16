<?php

function nestedOptions($items = [], $level = 0) {
    $content = null;

    foreach($items as $id => $item) {
        $content .= '<option value="'. $id .'">'. (str_repeat('-', $level) .' '. $item['title']) .'</option>';
        if(isset($item['children'])) {
            $content .= PHP_EOL . nestedOptions($item['children'], $level + 1);
        }
    }

    return $content;
}

?>
<h2>Создать новую публикацию</h2>
<fieldset>
    <form action="<?= $url->path('articles/compose') ?>" method="post">

        <p>
            <label for="title">Заголовок:</label>
            <input class="w100p" name="title" id="title" value="<?= $request->getPost('title') ?>" type="text"/>
        </p>

        <p>
            <label for="slug">Slug:</label>
            <input class="w100p" name="slug" id="slug" type="text" value="<?= $request->getPost('slug') ?>"/>
        </p>

        <p>
            <label for="copypaste">Ссылка на оригинал:</label>
            <input class="w100p" name="copypaste_source" id="copypaste" type="text" value="<?= $request->getPost('copypaste_source') ?>"/>
        </p>

        <p>
            <label for="category">Категория:</label>
            <select class="w100p" name="category_id" id="category" size="10">
                <?= nestedOptions($categoriesTree); ?>
            </select>
            <a href="<?= $url->path('articles/edit-category'); ?>" target="_blank">Управление категориями</a>
        </p>

        <p>
            <label for="message">Текст публикации:</label>
            <textarea class="w100p h150" name="content" id="message"><?= $request->getPost('content') ?></textarea>
        </p>

        <p>
            <label for="tags">Теги:</label>
            <input class="w100p" name="tags" id="tags" value="<?= $request->getPost('tags') ?>" type="text"/>
        </p>

        <p>
            <label for="status">Публиковать:</label>
            <input name="status" id="status" value="published" type="checkbox"/>
        </p>

        <p>
            <input class="formbutton" value="Добавить" type="submit"/>
        </p>

    </form>
</fieldset>