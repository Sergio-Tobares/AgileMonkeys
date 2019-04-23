<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // if it is not admin the user cant create any user 
        if (Yii::$app->user->identity->rol=='Admin') echo Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'email:email',
            // 'status',
            'rol',
            // 'created_at',
            // 'updated_at',
            // we change the action column to hide the delete button and allow only that in the view file
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['width' => '100'],
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url,
                        ['title' => Yii::t('app', 'Ver Expediente'),]);
                    },
                    'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,
                        ['title' => Yii::t('app', 'Modificar Expediente'),]);
                    },
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action == 'view') {
                        return Url::to(['user/'.$action, 'id' => $model->id]);}
                    if ($action == 'update') {
                        return Url::to(['user/'.$action, 'id' => $model->id]);}
                    }
                    ],
        ],
    ]); ?>
</div>
