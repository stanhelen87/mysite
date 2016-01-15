<?php

class ProductController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

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
	//	public function accessRules()
//	{
//		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
//		);
//	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions' => array('index', 'view', 'search', 'select','addtocart','deletecart'),
				'users' => array('*'),
			),
			array('allow',
				'actions'=>array('admin','create','update','delete'),
				'users' => array('adminelena'),
			),
			//array('allow',
			//	'users' => array('@'),
			//),
			array('deny',
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Product;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Product'])) {
			$model->attributes = $_POST['Product'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id_product));
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Product'])) {
			$model->attributes = $_POST['Product'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id_product));
		}

		$this->render('update', array(
			'model' => $model,
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
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	//public function actionIndex()
//	{
//	$dataProvider=new CActiveDataProvider('Product');
//	$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
//	}
	public function actionIndex()
	{
		//var_dump($_GET);
		if (isset($_GET['id_inkind'])) {
			$criteria = new CDbCriteria(array(
				'condition' => 'id_inkind=' . $_GET['id_inkind']
			));
			$data = Inkind::items($_GET['id_inkind']);
			$inkind = $data->inkind;
			$kindparent = Kindparent::items($data->id_parent);
			$dataProvider = new CActiveDataProvider('Product', array(
				'pagination' => array(
					'pageSize' => 6,
				),
				'criteria' => $criteria,
			));
			$this->render('index', array(
				'dataProvider' => $dataProvider,
				'kindparent' => $kindparent,
				'inkind' => $inkind,
			));
			$id_inkind = $_GET['id_inkind'];
			$baseUrl = Yii::app()->createUrl('product/index', array('id_inkind' => $id_inkind));
			Yii::app()->user->setReturnUrl($baseUrl);
			//var_dump(Yii::app()->user->returnUrl);
		}
		else {
			$dataProvider = new CActiveDataProvider('Product');
			$this->render('index', array(
				'dataProvider' => $dataProvider,
			));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Product('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Product']))
			$model->attributes = $_GET['Product'];
		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Product the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Product::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Product $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSearch()
	{
		$search = new SiteSearchForm;

		if (isset($_POST['SiteSearchForm'])) {
			$_POST['SiteSearchForm']['string'] = trim($_POST['SiteSearchForm']['string']);
		//	var_dump($_POST['SiteSearchForm']['string']);
			$search->attributes = $_POST['SiteSearchForm'];
			$_GET['searchString'] = $search->string;
		} else {
			$search->string = $_GET['searchString'];
		}
		if ($search->validate()) {
			//$search->attributes = $_POST['SiteSearchForm'];
			//$_GET['searchString'] = $search->string;
			//} else {
			//$search->string = $_GET['searchString'];

				//$search->validate();
				$criteria = new CDbCriteria(array(
					'condition' => 'tbl_kindparent.kindparent like :keyword  or tbl_inkind.inkind like :keyword or t.name_product like :keyword',
					'join' => ' INNER JOIN tbl_inkind on t.id_inkind=tbl_inkind.id_inkind INNER JOIN tbl_kindparent on tbl_kindparent.id_parent=tbl_inkind.id_parent',
					'params' => array(
						':keyword' => '%' . $search->string . '%', ':keyword' => '%' . $search->string . '%', ':keyword' => '%' . $search->string . '%'
					),
				));
				//var_dump($search->string);
				//$productCount = Product::model()->count($criteria);
				//var_dump($productCount);
				//$pages = new CPagination($productCount);
				//var_dump($pages);
				//$pages->pageSize = 5;
				//$pages->applyLimit($criteria);
				//var_dump($pages->applyLimit($criteria));
				//$product = Product::model()->findAll($criteria);
				//var_dump($product);
				$dataProvider = new CActiveDataProvider('Product', array(
					'pagination' => array(
						'pageSize' => 10,
					),
					'criteria' => $criteria,
				));

				$this->render('index', array(
					'dataProvider' => $dataProvider,
				));
				//$this->render('found', array(
				//	'product' => $product,
				//	'pages' => $pages,
				//	'search' => $search,
				//));

			} else {
				//$error=$search->addError('jkhjh');
				//$z=$search->addError('password','Incorrect username or password.');
				//$search->getErrors();
				//var_dump($z);
				//$this->addError('password','Incorrect username or password.');

				throw new CHttpException(404, 'The requested page does not exist.');


			}
			//$this->redirect(array('site/index'));};
			//$this->render('siteSearch', array('form'=>$search));



	}

	public function actionSelect()
	{
		$select = new ProductSelectForm;
//var_dump($_POST['ProductSelectForm']);
		if (isset($_POST['ProductSelectForm'])) {
			$select->attributes = $_POST['ProductSelectForm'];
			$select->producer=$_POST['ProductSelectForm']['producer'];
			$_GET['kindparent'] = $select->kindparent;
			$_GET['inkind'] = $select->inkind;
			$_GET['producer'] = $select->producer;
			$_GET['min'] = $select->min;
			$_GET['max'] = $select->max;
			//$_GET['count']=count($_POST['ProductSelectForm']);
			//var_dump($_GET);
				}
				else {
					$select->kindparent = $_GET['kindparent'];
					$select->inkind = $_GET['inkind'];
					$select->producer = $_GET['producer'];
					$select->min = $_GET['min'];
					$select->max = $_GET['max'];
					//var_dump($_GET);
			}
		//var_dump($select->producer);
		if ($select->validate()) {
			$kindparent='=tbl_kindparent.kindparent';
			$inkind='=tbl_inkind.inkind';
			$producer='=tbl_producer.producer';
			//$producer1='Wilmar';
			//$producer2='Марко';
			//var_dump($producer1);
			$min='0';
			$max='100000';
			$empty=0;
			$c=$select->kindparent;
			If ($select->kindparent!='unselectValue') $kindparent="='$select->kindparent'";
							else  $empty=$empty+1;
			//var_dump($c!='unselectValue');
			If ($select->inkind!='unselectValue') {$inkind="='$select->inkind'";}
							else $empty=$empty+1;
			If (!empty($select->producer)) {
			$a=$select->producer;
			$producer=" in ('";
			For ($i=0;$i<count($select->producer);$i++){
				If ($i+1==count($select->producer)) $producer.="$a[$i]')";
				else $producer.="$a[$i]','";
			};
			//var_dump($producer);
			}
						else $empty=$empty+1;
			//If (!empty($select->producer)) $producer=$select->producer;
			If (!empty($select->min)) $min=$select->min;
						else $empty=$empty+1;
			If (!empty($select->max)) $max=$select->max;
						else $empty=$empty+1;
			//var_dump($kindparent);
			//var_dump($inkind);
			//var_dump($producer);
			//var_dump($min);
			//var_dump( $kindparent);
			//var_dump($_POST['ProductSelectForm']);
			//var_dump($empty);
			//var_dump($select->kindparent);
			If ($empty==5) {
				//throw new CHttpException(404, 'The requested page does not exist.');
				///$this->redirect(array('site/index'));

				} else{
			$criteria = new CDbCriteria(array(
				//'condition' => 'tbl_kindparent.kindparent=:kindparent  and t.cost<=:max and t.cost>=:min and tbl_inkind.inkind=:inkind',
				//'join' => ' INNER JOIN tbl_inkind on t.id_inkind=tbl_inkind.id_inkind INNER JOIN tbl_kindparent on tbl_kindparent.id_parent=tbl_inkind.id_parent',
				//'condition' => "tbl_kindparent.kindparent=:kindparent and tbl_inkind.inkind=:inkind and t.cost>=:min and t.cost<=:max and tbl_producer.producer in ('$producer1','$producer2')",
				'condition' => "tbl_kindparent.kindparent $kindparent and tbl_inkind.inkind $inkind and tbl_producer.producer $producer and t.cost>=:min and t.cost<=:max",
				'join' => ' INNER JOIN tbl_inkind on t.id_inkind=tbl_inkind.id_inkind INNER  JOIN tbl_kindparent on tbl_kindparent.id_parent=tbl_inkind.id_parent INNER JOIN tbl_producer on t.id_producer=tbl_producer.id_producer ',
				'params' => array(
					// ':kindparent'=>$kindparent,
					//':inkind' => $inkind,
					//':producer' => $producer,
					':min' => $min,
					':max' => $max,
				),
			));
//var_dump($criteria);
			$dataProvider = new CActiveDataProvider('Product', array(
				'pagination' => array(
					'pageSize' => 6,
				),
				'criteria' => $criteria,
			));
			$this->render('index', array(
				'dataProvider' => $dataProvider,
			));}
			//$productCount = Product::model()->count($criteria);
		//	var_dump($productCount);
			//$pages = new CPagination($productCount);
			//$pages->pageSize = 5;
			//$pages->applyLimit($criteria);
			//$product = Product::model()->findAll($criteria);

			//var_dump($product);
			//$this->render('select', array(
			//	'product' => $product,
			//	'pages' => $pages
			//));
		}
		else {
			//$error=$search->addError('jkhjh');
			//$z=$search->addError('password','Incorrect username or password.');
			//$search->getErrors();
			//var_dump($z);
			//$this->addError('password','Incorrect username or password.');
			//var_dump($_POST['ProductSelectForm']);
			throw new CHttpException(404, 'The requested page does not exist.');
		}
	}
	public function actionAddToCart($id)
	{
		//$cart=new EShoppingCart;
		//$cart->init();
		//var_dump($_GET);
		$cN = new CallCenterNotifier();
		//$cart->attachEventHandler('onUpdatePosition',array($cN, 'updatePositionInShoppingCart'));
		//var_dump($cart->attachEventHandler('onUpdatePosition',array($cN, 'updatePositionInShoppingCart')));
		Yii::app()->shoppingCart->attachEventHandler('onUpdatePosition',array($cN, 'updatePositionInShoppingCart'));
		$this->loadModel($id);
		$product = Product::model()->findByPk($id);
		//var_dump($product);
		//$cart->put($product);
		Yii::app()->shoppingCart->put($product);
		//var_dump($_SESSION);
		//Проверка содержания корзины
		$position1 = Yii::app()->shoppingCart->getItemsCount();
	//	var_dump($position1);
		$position2= Yii::app()->shoppingCart->getPositions();
	//	var_dump($position2);
		Foreach($position2 as $position) {
		$price = $position->getQuantity();
		//var_dump($price);//2
		//Отображение
			//$this->redirect(array('product/index'));
		//var_dump($_SESSION);
		//$this->redirect(array('import/makecart'));


		}

		//var_dump(Yii::app()->user->returnUrl);
		$url=Yii::app()->user->returnUrl;
		$this->redirect($url);

		//$cN->Data();
		//var_dump($cN->Data());



	}
	public function actionDeleteCart($id)
	{
		//Yii::app()->shoppingCart->remove($id);
		$product = Product::model()->findByPk($id);
		$position = Yii::app()->shoppingCart->itemAt("Product$id");
		$quantity = $position->getQuantity();
		//$quantity = $position->getQuantity();
		//var_dump($position);
		Yii::app()->shoppingCart->update($product,($quantity-1));
		$this->redirect(array('import/makecart'));

	}
}