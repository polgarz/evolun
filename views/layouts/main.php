<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use lajax\languagepicker\widgets\LanguagePicker;
use evolun\user\widgets\ProfileDropdown;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="/favicon.ico">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    <?php if (Yii::$app->params['logo']): ?>
                        <img src="<?= Yii::$app->params['logo'] ?>" alt="<?= Yii::$app->name ?>" class="brandlogo-image" />
                    <?php endif ?>
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    <?php if (Yii::$app->params['logo']): ?>
                        <img src="<?= Yii::$app->params['logo'] ?>" alt="<?= Yii::$app->name ?>" class="brandlogo-image" />
                    <?php endif ?>
                    <?= Yii::$app->name ?>
                </span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only"><?= Yii::t('menu', 'Navigation') ?></span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <?= ProfileDropdown::widget() ?>
                        <?= LanguagePicker::widget([
                            'itemTemplate' => '<li><a href="{link}" title="{language}"><i class="{language}"></i> {name}</a></li>',
                            'activeItemTemplate' => '<a href="#" class="dropdown-toggle" title="{language}" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-flag-o"></i></a>',
                            'parentTemplate' => '<li class="dropdown">{activeItem}<ul class="dropdown-menu" role="menu">{items}</ul></li>',
                            'encodeLabels' => false,
                        ]) ?>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <?= Nav::widget([
                    'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
                    'encodeLabels' => false,
                    'items' => [
                        '<li class="header">' . Yii::t('menu', 'MENU') . '</li>',
                        ['label' => '<i class="fa fa-home"></i> <span>' . Yii::t('menu', 'Summary') . '</span>', 'url' => ['/site/index']],
                        ['label' => '<i class="fa fa-user"></i> <span>' . Yii::t('menu', 'Volunteers') . '</span>', 'url' => ['/user/default/index'], 'visible' => Yii::$app->user->can('showUsers') && Yii::$app->hasModule('user')],
                        ['label' => '<i class="fa fa-lock"></i> <span>' . Yii::t('menu', 'Permissions') . '</span>', 'url' => ['/user/rbac/index'], 'visible' => Yii::$app->user->can('managePermissions') && Yii::$app->hasModule('user')],
                        ['label' => '<i class="fa fa-child"></i> <span>' . Yii::t('menu', 'Kids') . '</span>', 'url' => ['/kid/default/index'], 'visible' => Yii::$app->user->can('showKids') && Yii::$app->hasModule('kid')],
                        ['label' => '<i class="fa fa-calendar"></i> <span>' . Yii::t('menu', 'Events') . '</span>', 'url' => ['/event/default/index'], 'visible' => Yii::$app->user->can('showEvents') && Yii::$app->hasModule('event')],
                        ['label' => '<i class="fa fa-users"></i> <span>' . Yii::t('menu', 'Groups') . '</span>', 'url' => ['/group/default/index'], 'visible' => Yii::$app->user->can('showGroups') && Yii::$app->hasModule('group')],
                        ['label' => '<i class="fa fa-info-circle"></i> <span>' . Yii::t('menu', 'Informations') . '</span>', 'url' => ['/post/default/index'], 'visible' => Yii::$app->user->can('showPosts') && Yii::$app->hasModule('post')],
                    ],
                ]) ?>

            </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <?php if (isset($this->params['pageHeader'])): ?>
                    <h1>
                        <?= $this->params['pageHeader']['title'] ?>
                        <?php if (isset($this->params['pageHeader']['description'])): ?>
                        <small><?= $this->params['pageHeader']['description'] ?></small>
                        <?php endif ?>
                    </h1>
                <?php endif ?>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'tag' => 'ol'
                ]) ?>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <?= Alert::widget() ?>
                <?= $content ?>
            </section>
        </div>

        <footer class="main-footer">
            <strong>&copy; <?= date('Y') ?> | <a href="https://evolun.hu" target="_blank">Evolun</a></strong>
        </footer>
    </div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
