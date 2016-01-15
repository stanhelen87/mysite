<?php

class SiteSearch extends CWidget
{
    public $url;
    public $form;
    public function run()
    {
       $form = new SiteSearchForm();
       $form->clearErrors();
        if(isset($_POST['SiteSearchForm'])) $form->attributes = $_POST['SiteSearchForm'];
         if (isset($_POST['SiteSearchForm'])&&(!$form->validate())) {
           // unset($_POST['SiteSearchForm']);
            $form->clearErrors();
            $form->addError('string','Пустое значение поля');
             $z=$form->getErrors();
           // var_dump($z);
       // }
       }

        $this->render('siteSearch', array('form'=>$form));
       $form->clearErrors();
    }
}
