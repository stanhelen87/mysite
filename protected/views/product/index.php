<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

If (isset($kindparent)&isset($inkind)){
		$this->breadcrumbs=array("$kindparent"=>array("/product/search/" , 'searchString'=>$kindparent),
		"$inkind"=>Yii::app()->user->returnUrl,
	);}
	else If (isset($_GET['searchString'])){

		$searchString=$_GET['searchString'];
		$this->breadcrumbs=array("$searchString");};

$this->menu=array(
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
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

<h1>Наша продукция</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewindex',
)); ?>
