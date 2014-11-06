<?php

class Idiomas extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'idiomas';
	}

	public function rules()
	{
		return array(
			array('descripcion', 'required'),
			array('descripcion', 'length', 'max'=>64),
			array('id, descripcion', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'metaDocs' => array(self::HAS_MANY, 'MetaDocs', 'idioma'),
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
			'descripcion' => Yii::t('app', 'Idioma'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
