<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About:';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
	 
    <p class='lead'>This is a Web Aplication for the Agile Monkeys Api Test.</p>
    <?php
        echo Html::a('Signup', ['site/signup','id'=>Yii::$app->user->id], ['title'=>'Signup','class' => 'btn btn-success']);
        echo " &nbsp;";
        echo Html::a('Login', ['site/login','id'=>Yii::$app->user->id], ['title'=>'Login','class' => 'btn btn-success']);
	?>
    
</div>
