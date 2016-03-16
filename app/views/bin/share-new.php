<h2>Добавь код...</h2>
<fieldset>
    <form action="<?= $url->path('bin/save') ?>" method="post">

        <p>
            <label for="title">Заголовок:</label>
            <input class="w100p" name="title" id="title" value="<?= $request->getPost('title') ?>" type="text"/>
        </p>

        <p>
            <label for="message">Код:</label>
            <textarea class="w100p h150" name="bin-content" id="message"><?= $request->getPost('content') ?></textarea>
        </p>

        <p>
            <input class="formbutton" value="Добавить" type="submit"/>
        </p>

    </form>
</fieldset>