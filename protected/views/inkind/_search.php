<?php
/* @var $this InkindController */
/* @var $model Inkind */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_inkind'); ?>
		<?php echo $form->textField($model,'id_inkind'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_parent'); ?>
		<?php echo $form->textField($model,'id_parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inkind'); ?>
		<?php echo $form->textField($model,'inkind',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->