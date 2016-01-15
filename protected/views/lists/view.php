<?php
/* @var $this ListsController */
/* @var $model Lists */

$this->breadcrumbs=array(
	'Lists'=>array('index'),
	$model->id_list,
);

$this->menu=array(
	array('label'=>'List Lists', 'url'=>array('index')),
	array('label'=>'Create Lists', 'url'=>array('create')),
	array('label'=>'Update Lists', 'url'=>array('update', 'id'=>$model->id_list)),
	array('label'=>'Delete Lists', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_list),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lists', 'url'=>array('admin')),
);
?>

<h1>View Lists #<?php echo $model->id_list; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_list',
		'id_import',
		'id_product',
		'quantity',
		'price',
	),
)); ?>
