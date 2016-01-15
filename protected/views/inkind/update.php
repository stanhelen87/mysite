<?php
/* @var $this InkindController */
/* @var $model Inkind */

$this->breadcrumbs=array(
	'Inkinds'=>array('index'),
	$model->id_inkind=>array('view','id'=>$model->id_inkind),
	'Update',
);

$this->menu=array(
	array('label'=>'List Inkind', 'url'=>array('index')),
	array('label'=>'Create Inkind', 'url'=>array('create')),
	array('label'=>'View Inkind', 'url'=>array('view', 'id'=>$model->id_inkind)),
	array('label'=>'Manage Inkind', 'url'=>array('admin')),
);
?>

<h1>Update Inkind <?php echo $model->id_inkind; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>