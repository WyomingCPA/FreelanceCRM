<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Countsmoking */
/* @var $form ActiveForm */
?>
<div class="countsmoking-add">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'data') ?>
        <?= $form->field($model, 'count') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- countsmoking-add -->
