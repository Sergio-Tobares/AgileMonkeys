<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if (Yii::$app->user->identity->rol!='Pending') echo Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'photo',
    		['attribute' => 'image','format' => 'html','label'=>'Foto',
    		'value' => function ($model) {
    			return Html::a(Html::img($model->photo,['width' => '75px']),['customers/view', 'id' => $model->id_customer]);
	    		},],
    		'id_customer',
            'name',
            'surname',
            
            /*'id_created',
            'id_updated',
            'created',
            'updated',*/

            // we change the action column to hide the delete and update button and allow only that in the view file
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['width' => '100'],
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url,
                        ['title' => Yii::t('app', 'View'),]);
                    },
                    'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,
                        ['title' => Yii::t('app', 'Edit'),]);
                    },
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action == 'view') {
                        return Url::to(['customers/'.$action, 'id' => $model->id_customer]);}                    
                    if ($action == 'update') {
                        return Url::to(['customers/'.$action, 'id' => $model->id_customer]);}
                    }
                    ],
        ],
    ]); ?>
</div>
