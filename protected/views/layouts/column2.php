<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">

		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-6 last">
	<div id="sidebar">
		<?php
		$this->widget('CartCount');
		$this->widget('SiteSearch');
		$this->widget('ProductSelect');
		//echo CHtml::beginForm(array('product/view&id='.$_POST['id_product']));
		//echo CHtml::textField('id_product','Введите наименование проодукта');
	//	echo CHtml::endForm();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>
