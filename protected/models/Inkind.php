<?php

/**
 * This is the model class for table "{{inkind}}".
 *
 * The followings are the available columns in table '{{inkind}}':
 * @property integer $id_inkind
 * @property integer $id_parent
 * @property string $inkind
 *
 * The followings are the available model relations:
 * @property Kindparent $idParent
 * @property Patterninkind[] $patterninkinds
 * @property Product[] $products
 */
class Inkind extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	private static $_items;
	public function tableName()
	{
		return '{{inkind}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public static function items($id_inkind)
	{
		if(!isset(self::$_items[$id_inkind]))
			self::loadItems($id_inkind);
		return self::$_items[$id_inkind];
	}

	private static function loadItems($id_inkind)
	{
		self::$_items[$id_inkind]=array();
		$model=self::model()->find(array(
			'select'=>'inkind, id_parent',
			'condition'=>'id_inkind=:id',
			'params'=>array(':id'=>$id_inkind),
			//'order'=>'position',
		));

		self::$_items[$id_inkind]=$model;
	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_parent', 'numerical', 'integerOnly'=>true),
			array('inkind', 'length', 'max'=>20),
			array('inkind, id_parent','required'),
			array('inkind', 'match', 'pattern'=>'/\A[А-Яа-яЁё\s]+\z/u',
				'message'=>'В названиях видов продуктов используйте русские буквы, пробелы.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.

			array('id_inkind, id_parent, inkind', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idParent' => array(self::BELONGS_TO, 'Kindparent', 'id_parent'),
			'patterninkinds' => array(self::HAS_MANY, 'Patterninkind', 'id_inkind'),
			'products' => array(self::HAS_MANY, 'Product', 'id_inkind'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_inkind' => 'Id Inkind',
			'id_parent' => 'Id Parent',
			'inkind' => 'Inkind',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_inkind',$this->id_inkind);
		$criteria->compare('id_parent',$this->id_parent);
		$criteria->compare('inkind',$this->inkind,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inkind the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
