<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 19.11.2015
 * Time: 11:51
 */

class SiteSearchForm extends CFormModel

{
   public $string;

    public function rules() {
       return array(array('string', 'required'));
    }

    public function safeAttributes() {
        return array('string',);
    }

}
