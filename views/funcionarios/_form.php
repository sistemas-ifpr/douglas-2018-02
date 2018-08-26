<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Funcionarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="funcionarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpf')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '999.999.999-99',]) ?>

    <?= $form->field($model, 'telefone')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '(99) 9999-9999',]) ?>

    <?= $form->field($model, 'celular')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '(99) 99999-9999',]) ?>

    <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_admissao')->textInput() ?>

    <?= $form->field($model, 'data_demissao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
