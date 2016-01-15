<?php
/* @var $this ProducerController */
/* @var $data Producer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_producer')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_producer), array('view', 'id'=>$data->id_producer)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producer')); ?>:</b>
	<?php echo CHtml::encode($data->producer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />


</div>