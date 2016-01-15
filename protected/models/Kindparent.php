<?php

/**
 * This is the model class for table "{{kindparent}}".
 *
 * The followings are the available columns in table '{{kindparent}}':
 * @property integer $id_parent
 * @property string $kindparent
 *
 * The followings are the available model relations:
 * @property Inkind[] $inkinds
 */
class Kindparent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	private static $_items;
	public function tableName()
	{
		return '{{kindparent}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public static function items($id_parent)
	{
		if(!isset(self::$_items[$id_parent]))
			self::loadItems($id_parent);
		return self::$_items[$id_parent];
	}

	private static function loadItems($id_parent)
	{
		self::$_items[$id_parent]=array();
		$model=self::model()->find(array(
			'select'=>'kindparent',
			'condition'=>'id_parent=:id',
			'params'=>array(':id'=>$id_parent),
			//'order'=>'position',
		));

		self::$_items[$id_parent]=$model->kindparent;
	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kindparent', 'length', 'max'=>20),
			array('kindparent','required'),
			array('kindparent', 'match', 'pattern'=>'/\A[А-Яа-яЁё\s]+\z/u',
				'message'=>'В названиях видов продуктов используйте русские буквы, пробелы.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_parent, kindparent', 'safe', 'on'=>'search'),
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
			'inkinds' => array(self::HAS_MANY, 'Inkind', 'id_parent'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_parent' => 'Id Parent',
			'kindparent' => 'Kindparent',
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

		$criteria->compare('id_parent',$this->id_parent);
		$criteria->compare('kindparent',$this->kindparent,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kindparent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
