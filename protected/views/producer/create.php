<?php
/* @var $this ProducerController */
/* @var $model Producer */

$this->breadcrumbs=array(
	'Producers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Producer', 'url'=>array('index')),
	array('label'=>'Manage Producer', 'url'=>array('admin')),
);
?>

<h1>Create Producer</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>