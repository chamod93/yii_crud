<?php
use yii\helpers\html;
use yii\widgets\Activeform;
/* @var $this yii\web\View */

$this->title = 'Create Form';
?>
<div class="site-index">

<h1>View User</h1>
    
    <div class="body-content">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $developers->name; ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $developers->remarks; ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $developers->category; ?>
            </li>
        </ul>
        <div class="row">
        <span><?= Html::a('Go Back',['/site/users'],['class'=>'btn btn-primary'])?></span>
        </div>
    </div>
</div>
