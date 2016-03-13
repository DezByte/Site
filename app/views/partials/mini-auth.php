<?php if($auth->isGuest()): ?>
    <h3>Авторизация</h3>
    <form action="<?= $url->path('auth/index', ['back' => $router->getTargetUri()]); ?>" method="post">
        <p><label for="login">Логин:</label>
            <input name="email" id="login" value="" type="text" /></p>
        <p><label for="password">Пароль:</label>
            <input name="password" id="password" value="" type="password" /></p>
        <p><input name="send" class="formbutton" value="Войти" type="submit" /></p>
    </form>
<?php else: ?>
    <h3>Сессия</h3>
    <ul>
        <li>
            <i><?= $auth->getModel()->get('email'); ?></i>
        </li>
        <li>
            <a href="<?= $url->path('auth/close-session', ['back' => $router->getTargetUri()]); ?>">Выйти</a>
        </li>
    </ul>
<?php endif; ?>