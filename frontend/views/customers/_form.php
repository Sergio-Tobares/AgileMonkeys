<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form row">
	<div class="col-md-6">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'file')->fileInput() ?>

    <?php //echo $form->field($model, 'id_created')->textInput() ?>
    <?php //echo $form->field($model, 'id_updated')->textInput() ?>
    <?php //echo $form->field($model, 'created')->textInput() ?>
    <?php //echo $form->field($model, 'updated')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	</div>
</div>
