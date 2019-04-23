<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "User profile: ".$model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>        
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure that you want to delete this user?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	<div class="row">		
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-4 propietario">
					<span class="etiqueta"><?php echo $model->getAttributeLabel('username');;?></span>
				</div>
				<div class="col-md-8 propietario">
					<?php echo $model->username;?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 propietario">
					<span class="etiqueta"><?php echo $model->getAttributeLabel('email');;?></span>
				</div>
				<div class="col-md-8 propietario">
					<?php echo $model->email;?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 propietario">
					<span class="etiqueta"><?php echo $model->getAttributeLabel('created_at');;?></span>
				</div>
				<div class="col-md-8 propietario">
					<?php echo date('m-d-Y H:i', $model->created_at);?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 propietario">
					<span class="etiqueta"><?php echo $model->getAttributeLabel('updated_at');;?></span>
				</div>
				<div class="col-md-8 propietario">
					<?php echo date('m-d-Y H:i', $model->updated_at);?>
				</div>
			</div>
		</div>
		
	</div>
	<p><?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'pull-right btn btn-primary']) ?></p>
</div>