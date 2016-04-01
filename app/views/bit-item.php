<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= ($this->isSection('title') ? $this->section('title') :  $config['web']['siteSlogan']) . ' / ' . $config['web']['siteName'] ?></title>
</head>
<body>

<?= $this->section('content'); ?>

</body>
</html>