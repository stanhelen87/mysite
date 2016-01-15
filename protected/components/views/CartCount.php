<div id="Cart">
   <?php echo CHtml::image("$image",'busket',array('width'=>"30",'height'=>"30"));
  // echo CHtml::link("Всего покупок: $countCart",array('url' => array("/product/index/")));
  // echo CHtml::button('Купить',array('submit'=>array('product/addtocart/')));
    echo CHtml::button("Всего покупок: $countCart",array('submit'=>array('import/create')));?>
</br></br>
</div>
<div id="CartFooter"></div>
</div>