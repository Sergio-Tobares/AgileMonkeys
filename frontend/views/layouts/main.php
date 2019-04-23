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
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
    	'brandLabel' => Html::img('@web/imagenes/logosmall.png', ['alt'=>'Agile Monkeys Api']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
        		'class' => 'navbar-static-top',//'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?php /*= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) */?>
        <?= Alert::widget() ?>
        <?php if (!Yii::$app->user->isGuest) {
			?> 
			<div class="col-md-1">
				<div class="row">
					<div class="col-xs-2 col-md-12" style="margin:2px;">
						<?= Html::a('<span class="glyphicon glyphicon-briefcase"></span>', ['user/view'], ['title'=>'User Profile','class' => 'btn btn-info']);?></div>
					<div class="col-xs-2 col-md-12" style="margin:2px;">
						<?= Html::a('<span class="glyphicon glyphicon-user"></span>', ['user/index'], ['title'=>'Users List','class' => 'btn btn-info']);?></div>
					<div class="col-xs-2 col-md-12" style="margin:2px;">
						<?= Html::a('<span class="glyphicon glyphicon-user"></span>', ['user/index'], ['title'=>'Customers List','class' => 'btn btn-info']);?></div>
				</div>
			</div>
			<div class="col-md-11"><?= $content ?></div>		      
			<?php }
		else echo $content;
		?> 
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Agile Monkeys Api <?= date('Y') ?></p>

        <p class="pull-right">Dise&ntilde;ado por <a href="http://www.savocan.com" target="_BLANK">Savocan</a><?php //echo Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
