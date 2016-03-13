<h2>Авторизация</h2>
<fieldset>
    <legend>Ваши реквизиты</legend>
    <form action="<?= $url->path('auth/index', ['back' => $router->getTargetUri()]); ?>" method="post">
        <p><label for="login">Логин:</label>
            <input name="email" id="login" value="" type="text" /></p>
        <p><label for="password">Пароль:</label>
            <input name="password" id="password" value="" type="password" /></p>
        <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Войти" type="submit" /></p>
    </form>
</fieldset>