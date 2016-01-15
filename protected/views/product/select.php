<?php
/**
 * Created by PhpStorm
 * Date: 19.11.2015
 * Time: 11:58
 */


//var_dump($_POST);

Foreach ($product as $data) {
    $this->renderPartial('_view', array(
        'data' => $data
    ));
}
    ?>

    <br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>