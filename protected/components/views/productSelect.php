<div id="select">
    <div id="select_div">
        </br></br><h2>Найти товар</h2>
        <?php $url = $this->getController()->createUrl('product/select'); ?>
        <?php echo CHtml::beginForm($url); ?>
        <div class="row">
            <?php echo CHtml::errorSummary($form,'Ошибка ввода:',null,array('style'=>"color: red")); ?>
            </br> <h3>Категория товара</h3></br>
            <?php echo CHtml::activeDropDownList($form,'kindparent',$kindparent);?>
            </br></br><h3>Вид</h3>
            <?php echo CHtml::activeDropDownList($form,'inkind',$inkind); ?>
            </br></br><h3>Цена (у.е.)</h3>
            <p>min:<?php echo CHtml::activeNumberField($form,'min') ?></p>
            <p>max:<?php echo CHtml::activeNumberField($form,'max') ?></p>
            </br><h3>Производитель</h3>
          <?php echo CHtml::activeCheckBoxList($form,'producer',$producer) ?></p>

            <?php echo CHtml::SubmitButton('Поиск'); ?>

        </div>
        <?php echo CHtml::endForm(); ?>
    </div>
    <div id="SelectFooter"></div>
</div>
