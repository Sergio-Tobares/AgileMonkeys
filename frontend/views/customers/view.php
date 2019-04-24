<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->identity->rol!='Pending') echo Html::a('Update', ['update', 'id' => $model->id_customer], ['class' => 'btn btn-primary']) ?>
        <?php if (Yii::$app->user->identity->rol!='Pending') echo Html::a('Delete', ['delete', 'id' => $model->id_customer], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

       <!-- here we use a "list" widget to view all the data, but we could use bootstrap to present the data 
    		in a more pretty way -->
    		
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_customer',
            'name',
            'surname',
            //	'photo',
    		['attribute' => 'image','format' => 'html','label'=>'Photo',
    		'value' => function ($model) {
    		return Html::img($model->photo,['width' => '75px']);
    		},],
            //'created',
    		['attribute' => 'created',
    			'value' => function ($model) {
    				return date("m-d-Y h:i",$model->created); },],
            //'updated',
            ['attribute' => 'updated',
            	'value' => function ($model) {
            		return date("m-d-Y h:i",$model->updated); },],
            //'id_created',
    		['attribute' => 'id_created',
	    		'value' => function ($model) {
    					return ($model->createdby->username);},],
            //'id_updated',
            ['attribute' => 'id_updated',
            	'value' => function ($model) {
            			return ($model->updatedby->username);},],
        ],
    ]);

    ?>

</div>
