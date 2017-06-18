<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!--favicon-->
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js" ></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" ></script>
    <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <header class="main-header">
        <?= $this->render('//common/_menu') ?>
        <?= $content ?>
        <?= $this->render('//common/_footer') ?>
    </header><!-- end main-header -->
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
