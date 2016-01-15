<?php
/* @var $this ImportController */
/* @var $model Import */

$this->breadcrumbs=array(
	'Imports'=>array('index'),
	$model->id_import,
);

$this->menu=array(
	array('label'=>'List Import', 'url'=>array('index')),
	array('label'=>'Create Import', 'url'=>array('create')),
	array('label'=>'Update Import', 'url'=>array('update', 'id'=>$model->id_import)),
	array('label'=>'Delete Import', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_import),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Import', 'url'=>array('admin')),
);
?>

<h1>View Import #<?php echo $model->id_import; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_import',
		'status',
		'id_user',
		'sum_price',
		'create_time',
		'hours',
		'address',
	),
)); ?>
