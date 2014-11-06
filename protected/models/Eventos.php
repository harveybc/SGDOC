<?php

class Eventos extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'eventos';
	}

	public function rules()
	{
		return array(
			array('usuario, modulo, operacion', 'numerical', 'integerOnly'=>true),
			array('id, usuario, modulo, operacion', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'usuario0' => array(self::BELONGS_TO, 'Usuarios', 'usuario'),
			'modulo0' => array(self::BELONGS_TO, 'Modulos', 'modulo'),
			'operacion0' => array(self::BELONGS_TO, 'Operaciones', 'operacion'),
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
			'usuario' => Yii::t('app', 'Usuario'),
			'modulo' => Yii::t('app', 'Modulo'),
			'operacion' => Yii::t('app', 'Operacion'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('usuario',$this->usuario);

		$criteria->compare('modulo',$this->modulo);

		$criteria->compare('operacion',$this->operacion);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
