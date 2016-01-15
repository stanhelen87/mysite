<?php
/* @var $this KindparentController */
/* @var $model Kindparent */

$this->breadcrumbs=array(
	'Kindparents'=>array('index'),
	$model->id_parent,
);

$this->menu=array(
	array('label'=>'List Kindparent', 'url'=>array('index')),
	array('label'=>'Create Kindparent', 'url'=>array('create')),
	array('label'=>'Update Kindparent', 'url'=>array('update', 'id'=>$model->id_parent)),
	array('label'=>'Delete Kindparent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_parent),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kindparent', 'url'=>array('admin')),
);
?>

<h1>View Kindparent #<?php echo $model->id_parent; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_parent',
		'kindparent',
	),
)); ?>
