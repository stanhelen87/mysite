
<?php
/* @var $this ImportController */
/* @var $model Import */

$this->breadcrumbs=array(
    'Корзина'=>Yii::app()->user->returnUrl,
   'Оформить заказ',
);

$this->menu=array(
    array('label'=>'List Import', 'url'=>array('index')),
    array('label'=>'Manage Import', 'url'=>array('admin')),
);
?>

<h1>Корзина товаров</h1>
<?php
$this->widget('MakeCart');
?>