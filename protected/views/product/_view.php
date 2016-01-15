<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<div class="view">




	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode("#$data->id_product"), array('view', 'id'=>$data->id_product)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_product')); ?>:</b>
	<?php echo CHtml::encode($data->name_product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_inkind')); ?>:</b>
	<?php echo CHtml::encode($data->id_inkind); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:
	<?php echo CHtml::encode($data->cost); ?> у.е.</b>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sum')); ?>:</b>
	<?php echo CHtml::encode($data->sum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_producer')); ?>:</b>
	<?php echo CHtml::encode(Producer::items($data->id_producer));
	//echo CHtml::encode($data->id_producer); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('material')); ?>:</b>
	<?php echo CHtml::encode($data->material); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
	<?php echo CHtml::encode($data->color); ?>
	<br />
	<br />

	<b><?php echo CHtml::image($data->img);?></b>



	<b><?php //echo CHtml::submitButton('Купить');?><?php //echo CHtml::htmlButton('Обзор');?></b>
	<?php $url=Yii::app()->user->returnUrl;
	 echo CHtml::button('Купить',array('submit'=>array('product/addtocart/','id'=>$data->id_product)));
	//var_dump(session_status());
	?>

<br />



	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('material')); ?>:</b>
	<?php echo CHtml::encode($data->material); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
	<?php echo CHtml::encode($data->color); ?>
	<br />

	*/ ?>

</div>