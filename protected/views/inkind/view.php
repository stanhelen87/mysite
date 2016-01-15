<?php
/* @var $this InkindController */
/* @var $model Inkind */

$this->breadcrumbs=array(
	'Inkinds'=>array('index'),
	$model->id_inkind,
);

$this->menu=array(
	array('label'=>'List Inkind', 'url'=>array('index')),
	array('label'=>'Create Inkind', 'url'=>array('create')),
	array('label'=>'Update Inkind', 'url'=>array('update', 'id'=>$model->id_inkind)),
	array('label'=>'Delete Inkind', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_inkind),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Inkind', 'url'=>array('admin')),
);
?>

<h1>View Inkind #<?php echo $model->id_inkind; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_inkind',
		'id_parent',
		'inkind',
	),
)); ?>
