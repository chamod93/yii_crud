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
    <div class="jumbotron">
        <h1 style="color:blue;">YII CRUD Application</h1>
    </div>
    <div class="row">
        <span><?= Html::a('Create',['/site/create'],['class'=>'btn btn-primary'])?></span>
        <span><?= Html::a('Users',['/site/users'],['class'=>'btn btn-primary'])?></span> 
    </div>
    <div class="body-content">
        <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if(count($posts)>0): ?>
                <?php foreach($posts as $post):?>
                    <tr class="table-active">
                    <th scope="row"><?php echo $post->id; ?></th>
                    <td><?php echo $post->title; ?></td>
                    <td><?php echo $post->description; ?></td>
                    <td><?php echo $post->category; ?></td>
                    <td>
                        <span>
                            <?=HTML::a('View',['view','id'=>$post->id],['class'=>'label label-primary']); ?>
                            <?=HTML::a('Update',['update','id'=>$post->id],['class'=>'label label-success']); ?>
                            <?=HTML::a('Delete',['delete','id'=>$post->id],['class'=>'label label-danger']); ?>
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
