<?php
/**
 * @var \SiteDezz\Model\Entity\LatinWords $slug
*/
?>
<h2>Добавь код...</h2>
<fieldset>
    <form action="<?= $url->path('bin/share-new') ?>" method="post">

        <p>
            <label for="title">Заголовок:</label>
            <input class="w100p" name="title" id="title" value="<?= $request->getPost('title') ?>" type="text"/>
            <i><b><?= $slug->getWord(); ?></b></i>
        </p>

        <p>
            <label for="title">Язык:</label>
            <?= $select->addClass('w100p')->setAttribute('size', 5); ?>
        </p>

        <p>
            <label for="message">Код:</label>
            <textarea class="w100p h150" name="source_code" id="message"><?= $request->getPost('content') ?></textarea>
        </p>

        <p>
            <input class="formbutton" value="Добавить" type="submit"/>
        </p>

        <input type="hidden" name="slug_key" value="<?= $slug->id(); ?>">

    </form>
</fieldset>