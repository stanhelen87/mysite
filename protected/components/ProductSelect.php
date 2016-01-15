<?php

class ProductSelect extends CWidget
{
    public $inkind;
    public $kindparent;
    public $producer;

    public function run()

    {
        $criteria = new CDbCriteria();
        $criteria->select='inkind';
        $criteria->distinct=true;
        $t['unselectValue']=NULL;
        $this->inkind = Inkind::model()->findAll($criteria);
        //var_dump($this->inkind);
        For ($i=0;$i<count($this->inkind);$i++) {
            $t[$this->inkind[$i]->inkind]=$this->inkind[$i]->inkind;
        };
        $t['unselectValue']='';
        $this->inkind=$t;
        $t=[];
      // var_dump($this->inkind);
        $criteria = new CDbCriteria();
        $criteria->select='kindparent';
        $criteria->distinct=true;
        $t['unselectValue']=NULL;
        $this->kindparent = Kindparent::model()->findAll($criteria);
        //var_dump($this->inkind);
        For ($i=0;$i<count($this->kindparent);$i++) {
            $t[$this->kindparent[$i]->kindparent]=$this->kindparent[$i]->kindparent;
        };
        $this->kindparent=$t;
        $t=[];
        // var_dump($this->kindparent);
        $criteria = new CDbCriteria();
        $criteria->select='producer';
        $criteria->distinct=true;
        //$t['uncheckValue']=NULL;
        $this->producer = Producer::model()->findAll($criteria);
        //var_dump($this->inkind);
        For ($i=0;$i<count($this->producer);$i++) {
            $t[$this->producer[$i]->producer]=$this->producer[$i]->producer;
        };
        $this->producer=$t;
        $t=[];
        $form = new ProductSelectForm();
        $form->clearErrors();
      if(isset($_POST['ProductSelectForm'])){ $form->attributes = $_POST['ProductSelectForm'];}
       // if (isset($_POST['ProductSelectForm'])) {
         //   $form->kindparent=$_POST['ProductSelectForm']['kindparent'];
           // $form->inkind=$_POST['ProductSelectForm']['inkind'];
       //    $form->producer=$_POST['ProductSelectForm']['producer'];}
            //$form->min=$_POST['ProductSelectForm']['min'];
            //$form->max=$_POST['ProductSelectForm']['max'];
           // var_dump($_POST['ProductSelectForm']);
       // }

        //var_dump($_POST);
      //  var_dump($form->validate());
    //    if (isset($_POST['ProductSelectForm'])&&(!$form->validate())) {
           //  unset($_POST['SiteSearchForm']);
        //   $form->clearErrors();
          // $form->addError('ProductSelectForm','Задайте условия поиска');
          //  $z=$form->getErrors();
            // var_dump($z);
            // }
     // }
       // var_dump($_GET);
        $this->render('productSelect', array('form'=>$form,'inkind'=>$this->inkind,'kindparent'=>$this->kindparent,'producer'=>$this->producer));
        $form->clearErrors();
    }
}
