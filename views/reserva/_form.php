<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\models\Alunos;
use \app\models\Titulos;
use \app\models\Funcionarios;
use \yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Reserva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'isbn')->dropDownList(ArrayHelper::map(Titulos::find()->all(),'id', 'isbn', 'titulo')) ?>

    <?= $form->field($model, 'data_reserva')->input('date', []) ?>

    <?= $form->field($model, 'matricula_aluno')->dropDownList(ArrayHelper::map(Alunos::find()->all(),'id', 'matricula', 'nome')) ?>

    <?= $form->field($model, 'data_baixa')->input('date', []) ?>

    <?= $form->field($model, 'funcionario')->dropDownList(ArrayHelper::map(Funcionarios::find()->all(),'id', 'nome'))?>

    <?= $form->field($model, 'ativo')->dropDownList([ '1' => 'Sim' , '0' => 'Não']);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
