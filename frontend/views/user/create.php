<?php

use kartik\form\ActiveForm;

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Create new user';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$roles = ["Pending"=>"Pending","User"=>"User","Admin"=>"Admin"];
?>
<div class="user-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])  ?>

                <?= $form->field($model, 'email')?>

                <?= $form->field($model, 'password')->passwordInput()->label("Password") ?>
				
				<?= $form->field($model, 'rol')->dropDownList($roles, ['prompt' => 'Select one' ]); ?>
				
                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
