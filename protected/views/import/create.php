<?php
/* @var $this ImportController */
/* @var $model Import */

$this->breadcrumbs=array(
	'Корзина'=>array('index'),
	'Оформить заказ',
);

$this->menu=array(
	array('label'=>'List Import', 'url'=>array('index')),
	array('label'=>'Manage Import', 'url'=>array('admin')),
);
?>

<h1>Create Import</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>