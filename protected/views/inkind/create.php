<?php
/* @var $this InkindController */
/* @var $model Inkind */

$this->breadcrumbs=array(
	'Inkinds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Inkind', 'url'=>array('index')),
	array('label'=>'Manage Inkind', 'url'=>array('admin')),
);
?>

<h1>Create Inkind</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>