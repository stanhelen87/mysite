<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    'Авторизация',
);

$this->menu=array(
    array('label'=>'List User', 'url'=>array('index')),
    array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

    <h1>Заполните поля для авторизации</h1>

<?php $this->renderPartial('_aut', array('model'=>$model)); ?>