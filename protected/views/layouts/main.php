<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	<div id="preheader"   }>
		<?php
		echo CHtml::image("../images/fashion1.jpg",'fashion',array('width'=>"120",'height'=>"90"));
		echo CHtml::image("../images/fashion2.jpg",'fashion',array('width'=>"120",'height'=>"90"));
		echo CHtml::image("../images/fashion4.jpg",'fashion',array('width'=>"120",'height'=>"90"));
		echo CHtml::image("../images/fashion5.jpg",'fashion',array('width'=>"120",'height'=>"90"));
		echo CHtml::image("../images/fashion6.jpg",'fashion',array('width'=>"120",'height'=>"90"));
		echo CHtml::image("../images/fashion8.jpg",'fashion',array('width'=>"120",'height'=>"90"));
		echo CHtml::image("../images/fashion7.jpg",'fashion',array('width'=>"120",'height'=>"90"));
		echo CHtml::image("../images/fashion9.jpg",'fashion',array('width'=>"120",'height'=>"90"));
		echo CHtml::image("../images/fashion10.jpg",'fashion',array('width'=>"120",'height'=>"90"));
		echo CHtml::image("../images/fashion11.jpg",'fashion',array('width'=>"120",'height'=>"90"));


		?>
	</div>
	<div id="header">

		<div id="logo"><?php echo CHtml::image("http://localhost/Web/Shop/images/SHOES.gif",'busket',array('width'=>"50",'height'=>"50"));echo 'Shop.by'; ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/site/index')),
				array('label'=>'Доставка', 'url'=>array('/site/page', 'view'=>'import')),
				//array('label'=>'Корзина', 'url'=>array('/site/contact')),
				array('label'=>'Контакты', 'url'=>array('/site/contact')),
				array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<div class="span-5">
		<?php 	$this->widget('Menu');
		If (Yii::app()->user->name==='adminelena') {
		$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'For admin',
		));
		$this->widget('zii.widgets.CMenu', array(
		'items'=>$this->menu,
		'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();}?>
	</div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
