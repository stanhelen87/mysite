<div id="search">
    <div id="search_div">
    	<h3>Поиск по сайту</h3>
    	<?php $url = $this->getController()->createUrl('product/search'); ?>
<?php echo CHtml::beginForm($url); ?>
        <?php echo CHtml::beginForm(); ?>
<div class="row">

    <?php echo CHtml::errorSummary($form,'Ошибка ввода:',null,array('style'=>"color: red")); ?>
    <?php //echo CHtml::activeLabel($form,'string'); ?>
    <?php echo CHtml::activeTextField($form,'string') ?>
    <?php echo CHtml::error($form,'string'); ?>
    <?php echo CHtml::SubmitButton('Поиск'); ?>
</div>
<?php echo CHtml::endForm(); ?>
</div>
<div id="SearchFooter"></div>
</div>




