<?php

class Prestamos extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'prestamos';
	}

	public function rules()
	{
		return array(
			array('cedula, fechaPrestamo', 'required'),
			array('metaDoc', 'numerical', 'integerOnly'=>true),
			array('cedula', 'length', 'max'=>32),
			array('usuario, usuarioRcv', 'length', 'max'=>64),
			array('observaciones', 'length', 'max'=>128),
			array('id, metaDoc, cedula, usuario, usuarioRcv, fechaPrestamo, fechaDevolucion, observaciones', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'metaDoc0' => array(self::BELONGS_TO, 'MetaDocs', 'metaDoc'),
			'usuario0' => array(self::BELONGS_TO, 'Usuarios', 'usuario'),
			'usuarioRcv0' => array(self::BELONGS_TO, 'Usuarios', 'usuarioRcv'),
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
			'metaDoc' => Yii::t('app', 'Documento'),
			'cedula' => Yii::t('app', 'Cédula'),
			'usuario' => Yii::t('app', 'Usuario'),
			'usuarioRcv' => Yii::t('app', 'Usuario Rcv'),
			'fechaPrestamo' => Yii::t('app', 'Fecha Prestamo'),
			'fechaDevolucion' => Yii::t('app', 'Fecha Devolución'),
			'observaciones' => Yii::t('app', 'Observaciones'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('metaDoc',$this->metaDoc);

		$criteria->compare('cedula',$this->cedula,true);

		$criteria->compare('usuario',$this->usuario,true);

		$criteria->compare('usuarioRcv',$this->usuarioRcv,true);

		$criteria->compare('fechaPrestamo',$this->fechaPrestamo,true);

		$criteria->compare('fechaDevolucion',$this->fechaDevolucion,true);

		$criteria->compare('observaciones',$this->observaciones,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
