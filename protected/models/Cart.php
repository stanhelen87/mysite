<?php
/**
 * Created by PhpStorm.
 * User: �������������
 * Date: 03.12.2015
 * Time: 13:30
 */

class Cart extends CFormModel

{
    public $address;
    public $hours;

    public function rules() {
        return array(
            array('address','required'),
            array('hours', 'safe'));
    }

  }
