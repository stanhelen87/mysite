<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id_user
 * @property string $surname
 * @property string $name
 * @property string $middlename
 * @property string $address
 * @property integer $status
 * @property string $number
 * @property string $username
 * @property string $password
 * @property string $hours
 * @property string $profile
 * @property string $email
 * @property string $salt
 *
 * The followings are the available model relations:
 * @property Import[] $imports
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */


	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('status','in','range'=>array(1, 2),'message'=>'Значение статуса выбрать из списка чисел: 1,2'),
			array('surname, name, middlename, address, salt', 'length', 'max'=>50),
			array('surname ,name, middlename', 'match', 'pattern'=>'/\A[А-Яа-яЁё\s]+\z/u',
				'message'=>'Используйте только русские буквы.'),
			array('address', 'match', 'pattern'=>'/\A[0-9А-Яа-яЁё\s\-\.\,]+\z/u',
				'message'=>'Используйте только русские  буквы (тире,точка,запятая).'),
			array('number', 'match', 'pattern'=>'/\A\+375\-(29|44|25|33)\-[0-9]{7}\z/u',
				'message'=>'Используйте формат номера +375-(29|44|25|33)-XXXXXXX.'),
			array('username, password', 'match', 'pattern'=>'/\A[0-9A-Za-z\s\-\_]+\z/u',
				'message'=>'Используйте цифры, латинские буквы, тире, знак подчеркивания.'),
			array('username', 'unique'),
			array('surname, name, middlename, address, number, username, password, email', 'required'),
			array('email', 'email'),
			array('number, username, profile, email', 'length', 'max'=>20),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_user, surname, name, middlename, address, status, number, username, password,  profile, email, salt', 'safe', 'on'=>'search'),
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
			'imports' => array(self::HAS_MANY, 'Import', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => 'Id User',
			'surname' => 'Фамилия',
			'name' => 'Имя',
			'middlename' => 'Отчество',
			'address' => 'Адрес',
			'status' => 'Статус',
			'number' => 'Номер телефона',
			'username' => 'Логин',
			'password' => 'Пароль',
			'profile' => 'Профиль',
			'email' => 'Email',
			'salt' => 'Salt',
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

		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('middlename',$this->middlename,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('profile',$this->profile,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('salt',$this->salt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function validatePassword($password)
	{
		//var_dump($password);
	//	var_dump($this->$password);
	//	$c=self::hashPassword($password);
		//var_dump($c);
	//	var_dump(CPasswordHelper::verifyPassword($password,$this->password));

		return CPasswordHelper::verifyPassword($password,$this->password);


	}

	public function hashPassword($password)
	{
		return CPasswordHelper::hashPassword($password);
	}

}
