<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id_product
 * @property string $name_product
 * @property integer $id_inkind
 * @property integer $cost
 * @property integer $sum
 * @property integer $id_producer
 * @property string $img
 * @property string $material
 * @property string $color
 *
 * The followings are the available model relations:
 * @property Import[] $imports
 * @property Patternproduct[] $patternproducts
 * @property Inkind $idInkind
 * @property Producer $idProducer
 */
class Product extends CActiveRecord implements IECartPosition
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		//Пока изменим на время шаблон класса CUrlValidator, чтобы получить localhost в названии класса(уберем точку)
		return array(
			array('id_inkind, cost, sum, id_producer', 'numerical', 'integerOnly'=>true),
			array('name_product, material, color', 'length', 'max'=>20),
			array('name_product','required'),
			array('material, color', 'match', 'pattern'=>'/\A[А-Яа-яЁё\s\-\.]+\z/u',
				'message'=>'В названиях цветов(материалов) используйте русские буквы(пробел,короткое тире).'),
			array('name_product', 'match', 'pattern'=>'/\A[А-Яа-яЁёA-Za-z\s\-\.]+\z/u',
				'message'=>'В названиях продуктов используйте русские буквы(пробел,точка).'),
			// Уже есть правила валидации для img array('img', 'safe'),
			array('img', 'url','pattern'=>'/^{schemes}:\/\/(([A-Z0-9][A-Z0-9_-]*)+)/i'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_product, name_product, id_inkind, cost, sum, id_producer, img, material, color', 'safe', 'on'=>'search'),
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
			'imports' => array(self::HAS_MANY, 'Import', 'id_product'),
			'patternproducts' => array(self::HAS_MANY, 'Patternproduct', 'id_product'),
			'idInkind' => array(self::BELONGS_TO, 'Inkind', 'id_inkind'
				),
			'Parent'=> array(self::HAS_MANY, 'Kindparent',array('id_parent'=>'id_parent'),'through'=>'idInkind',
				),
			'idProducer' => array(self::BELONGS_TO, 'Producer', 'id_producer'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_product' => 'Id',
			'name_product' => 'Наименование товара',
			'id_inkind' => 'Категория товара',
			'cost' => 'Цена',
			'sum' => 'Наличие на складе (пар)',
			'id_producer' => 'Производитель',
			'img' => 'Img',
			'material' => 'Материал',
			'color' => 'Цвет',
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

		$criteria->compare('id_product',$this->id_product);
		$criteria->compare('name_product',$this->name_product,true);
		$criteria->compare('id_inkind',$this->id_inkind);
		$criteria->compare('cost',$this->cost);
		$criteria->compare('sum',$this->sum);
		$criteria->compare('id_producer',$this->id_producer);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('material',$this->material,true);
		$criteria->compare('color',$this->color,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	function getId(){
		return 'Product'.$this->id_product;
	}

	function getPrice(){
		return $this->cost;
	}
}
