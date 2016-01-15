<?php
/* @var $this ProducerController */
/* @var $model Producer */

$this->breadcrumbs=array(
	'Producers'=>array('index'),
	$model->id_producer=>array('view','id'=>$model->id_producer),
	'Update',
);

$this->menu=array(
	array('label'=>'List Producer', 'url'=>array('index')),
	array('label'=>'Create Producer', 'url'=>array('create')),
	array('label'=>'View Producer', 'url'=>array('view', 'id'=>$model->id_producer)),
	array('label'=>'Manage Producer', 'url'=>array('admin')),
);
?>

<h1>Update Producer <?php echo $model->id_producer; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>