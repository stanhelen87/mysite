<?php

class ImportController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */


	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index', 'view'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('create','makecart'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('admin','create','update','delete'),
				'users' => array('adminelena'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Import;
		$baseUrl = Yii::app()->createUrl('import/admin');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if ((isset($_POST['Cart'])) && (!Yii::app()->shoppingCart->isEmpty()) && (!isset($_POST['Import']))) {
			$cart = new Cart;
			if (isset($_POST['Cart'])) {
				$cart->attributes = $_POST['Cart'];
				$_GET['Cart']['address'] = $cart->address;
				$_GET['Cart']['hours'] = $cart->hours;
			} else {
				$cart->address = $_GET['Cart']['address'];
				$cart->hours = $_GET['Cart']['hours'];
			}

			$positions = Yii::app()->shoppingCart->getPositions();
			$list = '';
			//var_dump($_POST);
			//var_dump($_GET);
			foreach ($positions as $position) {
				$quantity = $position->getQuantity();
				$list .= 'id_product=' . $position->id_product . '(' . $quantity . ' шт.);';
			}
			//var_dump($list);
			//var_dump($positions);
			$id_user = Yii::app()->user->getID();
			//var_dump($id_user);
			$sum_price = Yii::app()->shoppingCart->getCost();
			//var_dump($sum_price);
			//$model->id_user=$id_user;
			$cart->attributes = $_POST['Cart'];
			$cart->clearErrors();
			if ($cart->validate()) {
				$model->sum_price = $sum_price;
				$model->attributes = $cart->attributes;
				$model->status=Import::STATUS_ORDER;
				$model->save();
				//var_dump($model->id_import);
				foreach ($positions as $position) {
					$lists = new Lists;
					$lists->id_import = $model->id_import;
					$lists->id_product = $position->id_product;
					$lists->quantity = $position->getQuantity();
					$lists->price = $position->getSumPrice();
					$lists->save();
				}
				Yii::app()->shoppingCart->clear();
				if ($model->save()) {
					$this->redirect(array('site/index'));
					//var_dump($lists);
				}
			}
			//throw new CHttpException(404, 'The requested page does not exist.');
			//else $this->redirect(array('import/makecart'));
		}
		if (Yii::app()->shoppingCart->isEmpty()) {
			$message = 'Корзина пуста.Невозможно оформить заказ.';
			$this->render('error',
				array('message' => $message));
		}
		$return = Yii::app()->user->returnUrl;
		if (isset($_POST['Import'])) {
			$model->attributes = $_POST['Import'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id_import));
		}
		If ($return != $baseUrl) {
			if (Yii::app()->shoppingCart->isEmpty())
			{
				$message='Корзина пуста.Невозможно оформить заказ.';
				$this->render('error', array('message' => $message));
			}
			$this->render('MakeCart');
		}
		else
			{
				$this->render('create', array(
					'model' => $model,
				));
			}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Import']))
		{
			$model->attributes=$_POST['Import'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_import));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Import');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Import('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Import']))
			$model->attributes=$_GET['Import'];
		$baseUrl=Yii::app()->createUrl('import/admin');
		Yii::app()->user->setReturnUrl($baseUrl);
		var_dump(Yii::app()->user->returnUrl);
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Import the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Import::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Import $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='import-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionMakeCart()
	{
		$this->render('MakeCart');

	}

}
