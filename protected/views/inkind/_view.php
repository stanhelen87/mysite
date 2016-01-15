<?php
/* @var $this InkindController */
/* @var $data Inkind */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_inkind')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_inkind), array('view', 'id'=>$data->id_inkind)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parent')); ?>:</b>
	<?php echo CHtml::encode($data->id_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inkind')); ?>:</b>
	<?php echo CHtml::encode($data->inkind); ?>
	<br />


</div>