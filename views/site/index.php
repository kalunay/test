<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="b-form">
        <div class="b-form-header">
            Добавить контакт
        </div>
        <div class="b-form-form">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя'])->label(false) ?>

            <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Телефон'])->label(false) ?>

            <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="b-list">
        <div class="b-list-header">
            Список контактов
        </div>
        <div class="b-list-body">
        <?php foreach($contacts as $contact): ?>
            <div class="b-list-body-item">
                <div>
                    <?= $contact->name ?>
                    <?= Html::a('x', ['delete', 'id' => $contact->id], [
                    'class' => 'btn-del',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                </div>
                <i><?= $contact->phone ?></i>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    
</div>
