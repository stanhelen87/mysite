<?php
class CartCount extends CWidget
{
    public $countCart;
    public $image;
    public function run()
    {
        $countCart=Yii::app()->shoppingCart->getItemsCount();
        $image='http://localhost/web/Shop/images/busket2.jpg';
        $this->render('CartCount', array('countCart'=>$countCart,'image'=>$image));
    }

}