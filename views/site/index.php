<?php

/* @var $this yii\web\View */

$this->title = Yii::t('menu', 'Summary');
$this->params['breadcrumbs'][] = $this->title;
$this->params['pageHeader'] = ['title' => $this->title];
?>
<div class="row">
    <?= \evolun\event\widgets\MyEventsWidget::widget() ?>
</div>
<div class="row">
    <?= \evolun\user\widgets\RecentUsers::widget() ?>
    <?= \evolun\event\widgets\RecentEventsWidget::widget() ?>
</div>
<div class="row">
    <?= \evolun\group\widgets\GroupPosts::widget() ?>
</div>
