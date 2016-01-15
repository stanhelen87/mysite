<?php
/* @var $this KindparentController */
/* @var $data Kindparent */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parent')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_parent), array('view', 'id'=>$data->id_parent)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kindparent')); ?>:</b>
	<?php echo CHtml::encode($data->kindparent); ?>
	<br />


</div>