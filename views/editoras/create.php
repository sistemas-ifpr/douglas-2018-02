<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Editoras */

$this->title = 'Nova Editora';
$this->params['breadcrumbs'][] = ['label' => 'Editoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editoras-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
