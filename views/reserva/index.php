<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Reserva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'isbn',
            //'data_reserva',
            [
                'attribute'=>'data_reserva',
                'format'=>['DateTime','php:d/m/Y']
            ],
            'matricula_aluno',
            'data_baixa',
            //'funcionario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
