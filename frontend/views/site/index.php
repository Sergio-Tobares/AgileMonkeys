<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Agile Monkeys Api';
?>
<div class="site-index">

    <div class="row jumbotron">
        <?php if (Yii::$app->user->isGuest) {
        echo "<h2>Welcome!</h2>
        	<p class='lead'>In order to use this service you just need to log in with your user, you can also register a new one that will be validated by one of our admins.</p>";
        echo Html::a('Signup', ['site/signup','id'=>Yii::$app->user->id], ['title'=>'User signup','class' => 'btn btn-success']);
        echo " &nbsp;";
        echo Html::a('Login', ['site/login','id'=>Yii::$app->user->id], ['title'=>'User acces','class' => 'btn btn-success']);
        }
        else {
        	echo "<h2>Wellcome! ".Yii::$app->user->identity->username."</h2>".
	          "<p class='lead'>Now you can access the diferent options on the left menu.</p>";       	
		};        
        ?>
    </div>
</div>
