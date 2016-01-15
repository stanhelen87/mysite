
<div id="MakeCart">
    <div id="cart_div">
        <?php
        //var_dump(Yii::app()->shoppingCart->itemAt('Product1'));
      //var_dump($positions);
       // var_dump($_POST['Cart']);
        foreach ($positions as $position) {
            $id_product = $position->id_product;
            $criteria->params=array(':id'=>$id_product);
            $product=Product::model()->find($criteria);
            $quantity = $position->getQuantity();
           //var_dump($product->img);
            For ($i=1;$i<=$quantity;$i++) {?>
              <p>   <?php echo CHtml::image("$product->img", 'busket', array('width' => "60", 'height' => "60"));
                   echo CHtml::button("Удалить",array('submit'=>array('product/deletecart','id'=> $id_product)));
            }?>
              </p> </br>
        <?php }?>
        </br></br><h2>Данные покупателя</h2>
        <?php $url = $this->getController()->createUrl('import/create'); ?>
        <p>Фамилия: <?php //var_dump($user);
        echo CHtml::encode($user[0]->surname);
       // echo $user->surname ?></p></br>
        <p>Имя: <?php  echo CHtml::encode($user[0]->name) ?></p></br>
        <p>Отчество: <?php echo CHtml::encode($user[0]->middlename) ?></p></br>
        <?php echo CHtml::beginForm($url); ?>
    <div class="row">
         <?php //var_dump($cart);
          //echo CHtml::errorSummary($cart,'Ошибка ввода:',null,array('style'=>"color: red")); ?>
         </br> <h3>Введите адрес доставки: </h3></br>
        <?php echo CHtml::activeTextField($cart,'address');?>
        <?php echo CHtml::error($cart,'address',array('style'=>"color: red")); ?>
        </br></br><h3>Укажите желаемое время доставки:</h3>
          <?php echo CHtml::activeRadioButtonList($cart,'hours',array('C 8 00 до 12 00'=>'С 8 00 до 12 00', 'C 12 00 до 18 00'=>'C 12 00 до 18 00', 'C 18 00 до 22 00'=>'C 18 00 до 22 00')) ?></br>
        <?php echo CHtml::SubmitButton('Отправить'); ?>
    </div>
        <?php echo CHtml::endForm(); ?>
    </div>
    <div id="MakeCartFooter"></div>
</div>