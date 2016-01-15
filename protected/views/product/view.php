<?php
/* @var $this ProductController */
/* @var $model Product */
$data=Inkind::items($model->id_inkind);
$inkind=$data->inkind;
$kindparent=Kindparent::items($data->id_parent);
$this->breadcrumbs=array("$kindparent"=>array("/product/search/" , 'searchString'=>$kindparent),
	"$inkind"=>Yii::app()->user->returnUrl,
	"#id=$model->id_product",
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->id_product)),
	array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_product),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<h1>Характеристики товара с #id=<?php echo $model->id_product; ?></h1>
<br />

<br />
<?php $this->renderPartial('_view', array('data'=>$model)); ?>

