<?php

class AnotacionesController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', 
				'actions'=>array('admin','create','update','DisplayArchivo'),
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('delete'),
				'users'=>array('admin'),
			),
			array('deny', 
				'users'=>array('*'),
			),
		);
	}
/**
     * Opens the dialog in browser to open/save the image.
     */
    public function actionDisplayArchivo() {
        ob_clean();
        $model = $this->loadModel($_GET['id']);
                ob_clean();
        $model = $this->loadModel($_GET['id']);
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
        header('Content-Type: ' . "text/html; charset=iso-8859-1");
        header('Content-Disposition: attachment; filename="' . $model->descripcion.'.html"');
        echo $model->contenido;
    }
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	public function actionCreate()
	{
		$model=new Anotaciones;

		$this->performAjaxValidation($model);

		if(isset($_POST['Anotaciones']))
		{
			$model->attributes=$_POST['Anotaciones'];
		

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

		if(isset($_POST['Anotaciones']))
		{
			$model->attributes=$_POST['Anotaciones'];
		
			if($model->save())
				$this->redirect(array('/MetaDocs/view','id'=>$model->documento));
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
		$dataProvider=new CActiveDataProvider('Anotaciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Anotaciones('search');
		if(isset($_GET['Anotaciones']))
			$model->attributes=$_GET['Anotaciones'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Anotaciones::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
		}
		return $this->_model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='anotaciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
