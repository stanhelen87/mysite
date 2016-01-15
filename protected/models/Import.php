<?php

/**
 * This is the model class for table "{{import}}".
 *
 * The followings are the available columns in table '{{import}}':
 * @property integer $id_import
 * @property integer $status
 * @property integer $id_user
 * @property integer $sum_price
 * @property integer $create_time
 * @property string $hours
 * @property string $address
 *
 * The followings are the available model relations:
 * @property User $idUser
 * @property Lists[] $lists
 */
class Import extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	const STATUS_ORDER=1;
	const STATUS_BUY=2;

	public function tableName()
	{
		return '{{import}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, id_user, sum_price, create_time', 'numerical', 'integerOnly'=>true),
			array('hours', 'length', 'max'=>20),
			array('address', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_import, status, id_user, sum_price, create_time, hours, address', 'safe', 'on'=>'search'),
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
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
			'lists' => array(self::HAS_MANY, 'Lists', 'id_import'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_import' => 'Id Import',
			'status' => 'Status',
			'id_user' => 'Id User',
			'sum_price' => 'Sum Price',
			'create_time' => 'Create Time',
			'hours' => 'Hours',
			'address' => 'Address',
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

		$criteria->compare('id_import',$this->id_import);
		$criteria->compare('status',$this->status);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('sum_price',$this->sum_price);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('hours',$this->hours,true);
		$criteria->compare('address',$this->address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Import the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				//$this->create_time=$this->update_time=time();
				//var_dump(date("Y-m-d H:i:s"));
				$this->create_time=time();
				$this->id_user=Yii::app()->user->id;
			}
			//else
			//	$this->update_time=time();
			return true;
		}
		else
			return false;
	}
}
