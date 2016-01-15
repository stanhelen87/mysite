<?php
/* @var $this InkindController */
/* @var $model Inkind */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inkind-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_parent'); ?>
		<?php echo $form->textField($model,'id_parent'); ?>
		<?php echo $form->error($model,'id_parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inkind'); ?>
		<?php echo $form->textField($model,'inkind',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'inkind'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->