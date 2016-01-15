<?php
/* @var $this ListsController */
/* @var $model Lists */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_list'); ?>
		<?php echo $form->textField($model,'id_list'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_import'); ?>
		<?php echo $form->textField($model,'id_import'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_product'); ?>
		<?php echo $form->textField($model,'id_product'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->