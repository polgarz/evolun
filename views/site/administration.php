<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Administration');
$this->params['pageHeader'] = ['title' => $this->title];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->user->can('manageAdminData') && Yii::$app->hasModule('user')): ?>
    <h4><?= Yii::t('app', 'Volunteers') ?></h4>
    <div class="list-group">
        <a href="<?= Url::to(['/user/rbac/index']) ?>" class="list-group-item">
            <h4 class="list-group-item-heading"><?= Yii::t('app', 'Roles') ?></h4>
            <p class="list-group-item-text"><?= Yii::t('app', 'You can set the roles of the users. Be careful, danger zone!') ?></p>
        </a>
    </div>
<?php endif ?>
<?php if (Yii::$app->user->can('manageAdminData') && Yii::$app->hasModule('kid')): ?>
    <h4><?= Yii::t('app', 'Kids') ?></h4>
    <div class="list-group">
        <a href="<?= Url::to(['/kid/group/index']) ?>" class="list-group-item">
            <h4 class="list-group-item-heading"><?= Yii::t('app', 'Groups') ?></h4>
            <p class="list-group-item-text">
                <?= Yii::t('app', 'You can organize kids into groups. Kids can be filtered by these groups.') ?>
            </p>
        </a>
        <a href="<?= Url::to(['/kid/extra-field/index']) ?>" class="list-group-item">
            <h4 class="list-group-item-heading"><?= Yii::t('app', 'Extra fields') ?></h4>
            <p class="list-group-item-text">
                <?= Yii::t('app', 'You can extend the base data of kids with extra fields.') ?>
            </p>
        </a>
        <a href="<?= Url::to(['/kid/responsible/index']) ?>" class="list-group-item">
            <h4 class="list-group-item-heading"><?= Yii::t('app', 'Responsibilities') ?></h4>
            <p class="list-group-item-text"><?= Yii::t('app', 'You can set someone responsible to a kid (eg.: mentor).') ?></p>
        </a>
    </div>
<?php endif ?>