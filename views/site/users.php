<?php
use yii\helpers\html;
/* @var $this yii\web\View */

$this->title = 'My Application';
?>
<div class="site-index">
    <?php if(yii::$app->session->hasFlash('message')): ?>
    <div class="alert alert-dismissible alert-success">
        <?php echo yii::$app->session->getFlash('message'); ?>
    </div>
    <?php endif ?>
    <h1>Users</h1>
    <div class="row" style="margin-top:20px;">
        <span>
            <?= Html::a('Create',['/site/ucreate'],['class'=>'btn btn-success']) ?>
        </span>
    </div>
    <div class="body-content">
        <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Remarks</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if(count($developers)>0): ?>
                <?php foreach($developers as $dev):?>
                    <tr class="table-active">
                    <th scope="row"><?php echo $dev->id; ?></th>
                    <td><?php echo $dev->name; ?></td>
                    <td><?php echo $dev->remarks; ?></td>
                    <td><?php echo $dev->category; ?></td>
                    <td>
                        <span>
                            <?=HTML::a('View',['uview','id'=>$dev->id],['class'=>'label label-primary']); ?>
                            <?=HTML::a('Update',['uupdate','id'=>$dev->id],['class'=>'label label-default']); ?>
                            <?=HTML::a('Delete',['udelete','id'=>$dev->id],['class'=>'label label-danger']); ?>
                        </span>
                    </td>
                    </tr>
                <?php endforeach?>
            <?php else: ?>  
                <tr>
                    <td>No Records Found!</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        </div>

    </div>
</div>
