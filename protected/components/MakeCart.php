<?php
/**
 * Created by PhpStorm
 * Date: 03.12.2015
 * Time: 15:11
 */
class MakeCart extends CWidget
{
    public $id_user;
    //public $cart;
    public $user;
    //public $address;
   // public $hours;
    public $positions;
    public function run()

    {
        $cart = new Cart;

       // if (isset($_POST['Cart'])) {
         //   $cart->attributes = $_POST['Cart'];
         //   $_GET['address'] = $cart->address;
        //    $_GET['hours'] = $cart->hours;
       // } else {
       //     $cart->address = $_GET['address'];
      //      $cart->hours = $_GET['hours'];
     //   }
     //   if ($cart->validate()) {
        $this->id_user=Yii::app()->user->getId();
        //var_dump($this->id_user);
        $criteria = new CDbCriteria(array(
                'select' => 't.name, t.surname, t.middlename',
                //'join' => ' INNER JOIN tbl_user on t.id_user=tbl_user.id_user',
                'condition'=>'t.id_user=:id',
                'params'=>array(':id'=>$this->id_user)

    ));
        $this->user = User::model()->findAll($criteria);
            //var_dump( $this->user);
        $this->positions = Yii::app()->shoppingCart->getPositions();
        $criteria1 = new CDbCriteria();
        $criteria1->select='img';
        $criteria1->condition='id_product=:id';
       // $criteria->params=array(':id'=>$id_product);
        ;
        //var_dump($_GET);
      //  var_dump($_POST);
        if(isset($_POST['Cart'])){ $cart->attributes = $_POST['Cart'];$cart->validate();}
      /*  if (isset($_POST['Cart'])&&(!$cart->validate())) {
            $cart->clearErrors();
            $cart->addError('address',"Пустое значение поля ('Адрес доставки')");
            $z=$cart->getErrors();
            var_dump($z);
        };*/

       // var_dump($cart->validate());
        $this->render('MakeCart',
                array('cart' => $cart,
                    'user' => $this->user,
                    'positions' =>$this->positions,
                    'criteria'=>$criteria1,
                           // 'address' => $this->address,
                  //  'hours' => $this->hours
                ));
        }
   // }
}

