<?php
/* @var $this ListsController */
/* @var $model Lists */

$this->breadcrumbs=array(
	'Lists'=>array('index'),
	$model->id_list=>array('view','id'=>$model->id_list),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lists', 'url'=>array('index')),
	array('label'=>'Create Lists', 'url'=>array('create')),
	array('label'=>'View Lists', 'url'=>array('view', 'id'=>$model->id_list)),
	array('label'=>'Manage Lists', 'url'=>array('admin')),
);
?>

<h1>Update Lists <?php echo $model->id_list; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>