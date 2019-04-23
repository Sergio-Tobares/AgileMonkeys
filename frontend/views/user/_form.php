<?php

use kartik\typeahead\Typeahead;

use kartik\date\DatePicker;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

$roles = ["Pending"=>"Pending","User"=>"User","Admin"=>"Admin"];

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<div class="row" style="max-width:50%;margin-left:5%;">
		
		<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
		<?php
		if (Yii::$app->user->identity->rol=='Admin')
			echo $form->field($model, 'rol')->dropDownList($roles, ['prompt' => 'Select one' ]);
		else
			echo $form->field($model, 'rol')->hiddenInput()->label(false);
		?>
		
	</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
