<?php
/* @var $this KindparentController */
/* @var $model Kindparent */

$this->breadcrumbs=array(
	'Kindparents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kindparent', 'url'=>array('index')),
	array('label'=>'Manage Kindparent', 'url'=>array('admin')),
);
?>

<h1>Create Kindparent</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>