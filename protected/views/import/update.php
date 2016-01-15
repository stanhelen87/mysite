<?php
/* @var $this ImportController */
/* @var $model Import */

$this->breadcrumbs=array(
	'Imports'=>array('index'),
	$model->id_import=>array('view','id'=>$model->id_import),
	'Update',
);

$this->menu=array(
	array('label'=>'List Import', 'url'=>array('index')),
	array('label'=>'Create Import', 'url'=>array('create')),
	array('label'=>'View Import', 'url'=>array('view', 'id'=>$model->id_import)),
	array('label'=>'Manage Import', 'url'=>array('admin')),
);
?>

<h1>Update Import <?php echo $model->id_import; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>