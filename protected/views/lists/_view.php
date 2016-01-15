<?php
/* @var $this ListsController */
/* @var $data Lists */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_list')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_list), array('view', 'id'=>$data->id_list)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_import')); ?>:</b>
	<?php echo CHtml::encode($data->id_import); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::encode($data->id_product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />


</div>