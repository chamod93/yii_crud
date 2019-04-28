<?php
use yii\helpers\html;
use yii\widgets\Activeform;
/* @var $this yii\web\View */

$this->title = 'Create Form';
?>
<div class="site-index">

<h1>Create Post</h1>
    
    <div class="body-content">
        <?php $form = ActiveForm::begin() ?>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?= $form->field($post,'title'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?= $form->field($post,'description')->textarea(['rows'=>'6']); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                    <?php $items = ['E-Commerce'=>'E-Commerce','CMS'=>'CMS','MVC'=>'MVC',];?>
                        <?= $form->field($post,'category')->dropDownList($items,['prompt'=>'Select']); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="col-lg-3">
                            <?= Html::submitButton('Create Post',['class'=>'btn btn-primary']); ?>
                        </div>
                        <div class="col-lg-3">
                            <a href= "<?php echo yii::$app->homeUrl; ?>" class="btn btn-primary">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>


        <?php ActiveForm::end() ?>
    </div>
</div>
