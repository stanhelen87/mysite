<?php
/* @var $this KindparentController */
/* @var $model Kindparent */

$this->breadcrumbs=array(
	'Kindparents'=>array('index'),
	$model->id_parent=>array('view','id'=>$model->id_parent),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kindparent', 'url'=>array('index')),
	array('label'=>'Create Kindparent', 'url'=>array('create')),
	array('label'=>'View Kindparent', 'url'=>array('view', 'id'=>$model->id_parent)),
	array('label'=>'Manage Kindparent', 'url'=>array('admin')),
);
?>

<h1>Update Kindparent <?php echo $model->id_parent; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>