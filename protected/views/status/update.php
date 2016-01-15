<?php
/* @var $this StatusController */
/* @var $model Status */

$this->breadcrumbs=array(
	'Statuses'=>array('index'),
	$model->name=>array('view','id'=>$model->id_status),
	'Update',
);

$this->menu=array(
	array('label'=>'List Status', 'url'=>array('index')),
	array('label'=>'Create Status', 'url'=>array('create')),
	array('label'=>'View Status', 'url'=>array('view', 'id'=>$model->id_status)),
	array('label'=>'Manage Status', 'url'=>array('admin')),
);
?>

<h1>Update Status <?php echo $model->id_status; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>