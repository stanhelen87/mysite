<?php

Yii::import('zii.widgets.CMenu');

class Menu extends CMenu
{
    public function init()
{
$criteria = new CDbCriteria;
$criteria->select = 'kindparent, id_parent';
$kindparent = Kindparent::model()->findAll($criteria);
Foreach ($kindparent as $object)
{
$mainlist[] = $object->kindparent;
$inkinds[$object->kindparent] = $object->inkinds(array('condition' => 'id_parent='."'$object->id_parent'"));
Foreach ($inkinds as $data)
{
Foreach ($data as $object1)
{
$list[$object->kindparent][$object1->id_inkind] = $object1->inkind;
$inkinds = [];
}
}
}
//var_dump($mainlist);
//var_dump($list);
Foreach ($list as $key => $val) {
    //For ($j=0;$j<count($val);$j++){
//$inkinds[]=$object->inkinds(array('condition'=>"$list[$i]"));
    Foreach ($val as $Kkey => $Vval) {
        $menuitems[] = array('label' => "$Vval", 'url' => array("/product/index/" , 'id_inkind'=>$Kkey));
    }
    $this->items[] = array('label' => "$key", 'url' => array("/product/search/" , 'searchString'=>$key), 'items' => $menuitems);
    $menuitems = [];

};
        if(isset($this->htmlOptions['id']))
            $this->id=$this->htmlOptions['id'];
        else
            $this->htmlOptions['id']=$this->id;
        $route=$this->getController()->getRoute();
        $this->items=$this->normalizeItems($this->items,$route,$hasActiveChild);
}
}
