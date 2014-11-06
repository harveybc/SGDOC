<?php

class U_tecnicasController extends Controller
{
	public $layout='//layouts/column2';
	private $_model;

	public function filters()
	{
		return array(
			'accessControl', 
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  
				'actions'=>array('index','view','ut_search'),
				'users'=>array('*'),
			),
			array('allow', 
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny', 
				'users'=>array('*'),
			),
		);
	}

	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	public function actionCreate()
	{
		$model=new U_tecnicas;

		$this->performAjaxValidation($model);

		if(isset($_POST['U_tecnicas']))
		{
			$model->attributes=$_POST['U_tecnicas'];
		

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate()
	{
		$model=$this->loadModel();

		$this->performAjaxValidation($model);

		if(isset($_POST['U_tecnicas']))
		{
			$model->attributes=$_POST['U_tecnicas'];
		
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			$this->loadModel()->delete();

			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,
					Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('U_tecnicas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new U_tecnicas('search');
		if(isset($_GET['U_tecnicas']))
			$model->attributes=$_GET['U_tecnicas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=U_tecnicas::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
		}
		return $this->_model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='u-tecnicas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
                public function actionUt_search($term) {
        // TODO: Arreglar para que busque también cuando se tecleé el nombre, si conviene.
        //$sql = 'SELECT docIdent FROM clientes WHERE docIdent LIKE \'%' . trim($term) . '%\' LIMIT 10';
        // consulta proceso
        $result=array();
        $sql = 'SELECT distinct proceso_cod,concat(proceso_cod," - ",proceso) as label, proceso_cod as value FROM u_tecnicas WHERE (proceso LIKE :qterm)OR(proceso_cod LIKE :qterm) ORDER BY proceso ASC LIMIT 5';
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%'.$_GET['term'].'%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result = $command->queryAll();
        // consulta division
        $sql = 'SELECT distinct division_cod,concat(division_cod," - ",division) as label, division_cod as value FROM u_tecnicas WHERE (division LIKE :qterm)OR(division_cod LIKE :qterm) ORDER BY division ASC LIMIT 7';
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%'.$_GET['term'].'%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result2 = $command->queryAll();
        // consulta division
        $sql = 'SELECT distinct sub_division_cod,concat(sub_division_cod," - ",sub_division) as label, sub_division_cod as value FROM u_tecnicas WHERE (sub_division LIKE :qterm)OR(sub_division_cod LIKE :qterm) ORDER BY sub_division ASC LIMIT 5';
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%'.$_GET['term'].'%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result3 = $command->queryAll();
        // adiciona los encontrados al arreglo de salida
        foreach ($result2 as $res){
            array_push($result, $res);
        }
        foreach ($result3 as $res){
            array_push($result, $res);
        }
        //array_push($result, $result3);
        echo CJSON::encode($result); 
        exit;
    }
}
