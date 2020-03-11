<?php

/* @var $this yii\web\View */

$this->title = Yii::t('menu', 'Summary');
$this->params['breadcrumbs'][] = $this->title;
$this->params['pageHeader'] = ['title' => $this->title];

?>
<div class="row">
    <div class="col-md-6">
        <?= \evolun\event\widgets\MyEventsWidget::widget() ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= \evolun\user\widgets\RecentUsers::widget() ?>
    </div>
    <div class="col-md-4">
        <?= \evolun\event\widgets\RecentEventsWidget::widget() ?>
    </div>
    <div class="col-md-4">
        <?= \evolun\event\widgets\AbsencesWidget::widget(['threshold' => 4, 'from' => new \DateTime('last year')]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= \evolun\group\widgets\GroupPosts::widget() ?>
    </div>
</div>
