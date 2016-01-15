<?php
/* @var $this ImportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Imports',
);

$this->menu=array(
	array('label'=>'Create Import', 'url'=>array('create')),
	array('label'=>'Manage Import', 'url'=>array('admin')),
	array('label'=>'Product', 'url'=>array('product/index')),
	array('label'=>'Inkind', 'url'=>array('inkind/index')),
	array('label'=>'Import', 'url'=>array('import/index')),
	array('label'=>'Kindparent', 'url'=>array('kindparent/index')),
	array('label'=>'Lists', 'url'=>array('lists/index')),
	array('label'=>'Producer', 'url'=>array('producer/index')),
	array('label'=>'User', 'url'=>array('user/index')),
	array('label'=>'Status', 'url'=>array('status/index')),
);
?>

<h1>Imports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
