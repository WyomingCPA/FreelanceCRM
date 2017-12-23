<?php

  use yii\widgets\ActiveForm;
  use yii\helpers\Html;
  use yii\grid\GridView;

?>

<p>прошло времени от последней выкуренной сигареты: </p><h3><?= $interval; ?></h3>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'data',
        'count',
    ],
]); ?>



