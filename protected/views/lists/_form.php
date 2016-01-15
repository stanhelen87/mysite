<?php
/* @var $this ListsController */
/* @var $model Lists */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lists-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_list'); ?>
		<?php echo $form->textField($model,'id_list'); ?>
		<?php echo $form->error($model,'id_list'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_import'); ?>
		<?php echo $form->textField($model,'id_import'); ?>
		<?php echo $form->error($model,'id_import'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_product'); ?>
		<?php echo $form->textField($model,'id_product'); ?>
		<?php echo $form->error($model,'id_product'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity'); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->