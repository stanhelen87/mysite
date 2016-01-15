<?php
/**
 * Created by PhpStorm
 * Date: 19.11.2015
 * Time: 11:58
 */

if(!empty($search->string)): ?>
    <h1>Найдено по запросу: "<i><?php echo CHtml::encode($search->string); ?></i>"</h1>
<?php endif;
Foreach ($product as $data) {
    $this->renderPartial('_view', array(
        'data' => $data
    ));
}
    ?>

    <br/>
<?php
var_dump($pages);
$this->widget('CLinkPager',array('pages'=>$pages)); ?>