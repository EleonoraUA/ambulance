<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use johnitvn\ajaxcrud\BulkButtonWidget;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <style>
        #map {
            width: 100%;
            height: 400px;
            background-color: grey;
        }
    </style>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody(); ?>

<div class="wrap">
    <?php
    if (Yii::$app->user->can('dispatcher')) {
        $url = '/dispatcher/index';
    }
    NavBar::begin([
        'brandUrl' => isset($url) ? $url : Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-dark bg-primary',
            'style' => 'background-color: #C92F2B;',
        ],
    ]);

    if (Yii::$app->user->can('dispatcher')) {
            echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Головна', 'url' => ['/dispatcher/index'], 'linkOptions' => ['style' => 'color: #fff;']],
            ['label' => 'Новий виклик', 'url' => ['/dispatcher/index'], 'options' => ['style' => 'background-color: #F00;'], 'linkOptions' => ['style' => 'color: #fff;']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Увійти', 'url' => ['/user/security/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/user/security/logout'], 'post')
                . Html::submitButton(
                    '<span style="color: #fff;" >' . 'Вийти ('  . Yii::$app->user->identity->username . ')' . '</span>',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
            $url = '/dispatcher/index';
    }

    if (Yii::$app->user->can('subdispatcher')) {
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Головна', 'url' => ['/dispatcher/index'], 'linkOptions' => ['style' => 'color: #fff;']],
                Yii::$app->user->isGuest ? (
                ['label' => 'Увійти', 'url' => ['/user/security/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/user/security/logout'], 'post')
                    . Html::submitButton(
                        '<span style="color: #fff;" >' . 'Вийти ('  . Yii::$app->user->identity->username . ')' . '</span>',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        $url = '/subdispatcher/index';
    }

    if (Yii::$app->user->can('patient')) {
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Головна', 'url' => ['/patient-cab/index'], 'linkOptions' => ['style' => 'color: #fff;']],
                Yii::$app->user->isGuest ? (
                ['label' => 'Увійти', 'url' => ['/user/security/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/user/security/logout'], 'post')
                    . Html::submitButton(
                        '<span style="color: #fff;" >' . 'Вийти ('  . Yii::$app->user->identity->username . ')' . '</span>',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        $url = '/subdispatcher/index';
    }

    if (Yii::$app->user->can('brigade')) {
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Головна', 'url' => ['/brigade-cab/index'], 'linkOptions' => ['style' => 'color: #fff;']],
                Yii::$app->user->isGuest ? (
                ['label' => 'Увійти', 'url' => ['/user/security/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/user/security/logout'], 'post')
                    . Html::submitButton(
                        '<span style="color: #fff;" >' . 'Вийти ('  . Yii::$app->user->identity->username . ')' . '</span>',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        $url = '/subdispatcher/index';
    }

    NavBar::end();

    ?>

    <?php Modal::begin([
        "id"=>"ajaxCrudModal",
        "footer"=>"",// always need it for jquery plugin
    ])?>
    <?php Modal::end(); ?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Korobova <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
