<?php

/**
 * This is the model class for table "{{producer}}".
 *
 * The followings are the available columns in table '{{producer}}':
 * @property integer $id_producer
 * @property string $producer
 * @property string $country
 *
 * The followings are the available model relations:
 * @property Product[] $products
 */
class Producer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	private static $_items;
	public function tableName()
	{
		return '{{producer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('producer, country', 'length', 'max'=>20),
			array('producer, country','required'),
			array('country', 'match', 'pattern'=>'/^[А-Я,а-я,Ёё\s,\']+$/u',
				'message'=>'В названиях стран используйте русские буквы, пробелы, апострофы.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_producer, producer, country', 'safe', 'on'=>'search'),
		);
	}
	public static function items($id_producer)
	{
		if(!isset(self::$_items[$id_producer]))
			self::loadItems($id_producer);
		return self::$_items[$id_producer];
	}

	private static function loadItems($id_producer)
	{
		self::$_items[$id_producer]=array();
		$model=self::model()->find(array(
			'select'=>'producer',
			'condition'=>'id_producer=:id',
			'params'=>array(':id'=>$id_producer),
			//'order'=>'position',
		));

			self::$_items[$id_producer]=$model->producer;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'products' => array(self::HAS_MANY, 'Product', 'id_producer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_producer' => 'Id Producer',
			'producer' => 'Producer',
			'country' => 'Country',
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

		$criteria->compare('id_producer',$this->id_producer);
		$criteria->compare('producer',$this->producer,true);
		$criteria->compare('country',$this->country,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
