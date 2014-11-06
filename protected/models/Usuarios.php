<?php

class Usuarios extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'usuarios';
	}

	public function rules()
	{
		return array(
			array('Username, password, nombre, apellido', 'required'),
			array('ubicacionT, esAdministrador', 'numerical', 'integerOnly'=>true),
			array('Username, password, nombre, apellido', 'length', 'max'=>128),
			array('id, Username, password, nombre, apellido, ubicacionT, esAdministrador', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'anotaciones' => array(self::HAS_MANY, 'Anotaciones', 'usuario'),
			'autorizaciones' => array(self::HAS_MANY, 'Autorizaciones', 'usuario'),
			'competenciasUsuarioses' => array(self::HAS_MANY, 'CompetenciasUsuarios', 'usuario'),
			'evaluaciones' => array(self::HAS_MANY, 'Evaluaciones', 'usuario'),
			'eventoses' => array(self::HAS_MANY, 'Eventos', 'usuario'),
			'metaDocs' => array(self::HAS_MANY, 'MetaDocs', 'usuario'),
			'metaDocs1' => array(self::HAS_MANY, 'MetaDocs', 'userRevisado'),
			'permisoses' => array(self::HAS_MANY, 'Permisos', 'usuario'),
			'prestamoses' => array(self::HAS_MANY, 'Prestamos', 'usuario'),
			'prestamoses1' => array(self::HAS_MANY, 'Prestamos', 'usuarioRcv'),
			'ubicacionTecs' => array(self::HAS_MANY, 'UbicacionTec', 'supervisor'),
			'ubicacionT0' => array(self::BELONGS_TO, 'UbicacionTec', 'ubicacionT'),
		);
	}

	public function behaviors()
	{
		return array('CAdvancedArBehavior',
				array('class' => 'ext.CAdvancedArBehavior')
				);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'Username' => Yii::t('app', 'Username'),
			'password' => Yii::t('app', 'Password'),
			'nombre' => Yii::t('app', 'Nombre'),
			'apellido' => Yii::t('app', 'Apellido'),
			'ubicacionT' => Yii::t('app', 'Ubicacion T'),
			'esAdministrador' => Yii::t('app', 'Es Administrador'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('Username',$this->Username,true);

		//$criteria->compare('password',$this->password,true);

		$criteria->compare('nombre',$this->nombre,true);

		$criteria->compare('apellido',$this->apellido,true);

		$criteria->compare('ubicacionT',$this->ubicacionT);

		$criteria->compare('esAdministrador',$this->esAdministrador);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
