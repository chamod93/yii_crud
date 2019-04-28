<?php
use yii\helpers\html;
use yii\widgets\Activeform;
/* @var $this yii\web\View */

$this->title = 'Create Form';
?>
<div class="site-index">

<h1>Create Users</h1>
    
    <div class="body-content">
        <?php $form = ActiveForm::begin() ?>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?= $form->field($developers,'name'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?= $form->field($developers,'remarks')->textarea(['rows'=>'6']); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                    <?php $items = ['Graduate'=>'Graduate','Under-graduate'=>'Under-graduate','Diplomatic'=>'Diplomatic',];?>
                        <?= $form->field($developers,'category')->dropDownList($items,['prompt'=>'Select']); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="col-lg-3">
                            <?= Html::submitButton('Create User',['class'=>'btn btn-primary']); ?>
                        </div>
                        <div class="col-lg-3">
                        <span><?= Html::a('Go Back',['/site/users'],['class'=>'btn btn-primary'])?></span>
                        </div>
                    </div>
                </div>
            </div>


        <?php ActiveForm::end() ?>
    </div>
</div>
