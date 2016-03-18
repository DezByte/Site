<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?= ($this->isSection('title') ? $this->section('title') :  $config['web']['siteSlogan']) . ' / ' . $config['web']['siteName'] ?></title>
    <link rel="stylesheet" href="<?= $url->staticPath('css/styles.css'); ?>" type="text/css"/>
</head>
<body>
<div id="container">
    <div id="header">
        <h1><a href="/"><?= $config['web']['siteName'] ?></a></h1>
        <h2><?= $config['web']['siteSlogan'] ?></h2>
        <div class="clear"></div>
    </div>
    <div id="nav">
        <ul>
            <li><a href="<?= $url->path('index') ?>">Главная</a></li>
            <li><a href="<?= $url->path('articles/index') ?>">Странички</a></li>
            <li><a href="<?= $url->path('bin') ?>">Всякие полезности</a></li>
            <li><a href="<?= $url->path('index/instagram') ?>">Фоточки</a></li>
            <li class="end"><a href="<?= $url->path('index/about') ?>">О сайтеце</a></li>
        </ul>
    </div>
    <div id="body">

        <div id="content">

            <?= $this->fetch('partials/messages'); ?>

            <?= $this->section('content'); ?>

        </div>

        <div class="sidebar">
            <ul>

                <li>
                    <h3>Странички</h3>
                    <ul class="blocklist">
                        <li><a href="<?= $url->path('articles/most-popular') ?>">Популярные</a></li>
                        <li><a href="<?= $url->path('articles/latest') ?>">Самые новые</a></li>
                        <li><a href="<?= $url->path('articles/categories') ?>">По категориям</a></li>
                    </ul>
                </li>

                <li>
                    <?= $this->fetch('partials/mini-auth'); ?>
                </li>

            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div id="footer">
        <div class="footer-bottom">
            <p>&copy; <?= $config->get('web')->get('siteName') ?> 2015 - <?= date('Y') ?>. <br> Design by <a
                    href="http://zypopwebtemplates.com/">Free CSS Templates</a> by ZyPOP</p>
        </div>
    </div>
</div>
</body>
</html>
