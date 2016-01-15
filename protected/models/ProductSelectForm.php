<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 19.11.2015
 * Time: 11:51
 */

class ProductSelectForm extends CFormModel
{

    public $kindparent;
    public $inkind;
    public $producer=array();
    public $min;
    public $max;
    public $rangeKindparent;
    public $rangeInkind;
    public $rangeProducer;
    public $t;
    public $p;

    public function rules() {
       // $this->rangeKindparent=self::range('kindparent','Kindparent');
       // $this->rangeInkind=self::range('inkind','Inkind');
      //  $this->rangeProducer=self::range('producer','Producer');
       return array(
           //array('kindparent', 'in','range'=>$this->rangeKindparent),
           //array('inkind', 'in','range'=>$this->rangeInkind),
        //  array('producer', 'required'),
         // array('producer', 'in','range'=>$this->rangeProducer),
         array('kindparent', 'safe'),
           array('inkind', 'safe'),
          array('producer', 'safe'),
           array('min', 'safe'),
            array('max', 'safe'));
    }


    public function safeAttributes() {
        return array('kindparent','inkind','producer','min','max',);
    }
    public function range($select,$model) {
        $criteria = new CDbCriteria();
        $criteria->select=$select;
        $criteria->distinct=true;
        $this->t['unselectValue']=NULL;
        $this->$select=$model::model()->findAll($criteria);
        $this->p=$this->$select;
        //var_dump($this->p[0]);
        For ($i=0;$i<(count($this->p));$i++) {
           $this->t[$this->p[$i]->$select]=$this->p[$i]->$select;
            //$this->t[$i]=$this->p[$i]->$select;
        };
        $this->$select=$this->t;
    // var_dump($this->$select);
        $this->t=[];
        return ;

    }


}
