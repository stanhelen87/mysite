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


    <b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
    <?php echo CHtml::encode($data->cost); ?> у.е.</b>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_producer')); ?>:</b>
    <?php echo CHtml::encode(Producer::items($data->id_producer));
    //echo CHtml::encode($data->id_producer); ?>
    <br />

    <br />

    <b><?php echo CHtml::image($data->img);?></b>

    <br />
    <br />

    <br />
    <br />
    <?php $url=Yii::app()->user->returnUrl;
    echo CHtml::button('Обзор',array('submit'=>array('product/view/','id'=>$data->id_product)));
    //var_dump(session_status());
    ?>
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