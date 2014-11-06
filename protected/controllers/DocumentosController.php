<?php

class DocumentosController extends Controller {

    public $layout = '//layouts/responsiveLayout';
    private $_model;

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('admin', 'create', 'update', 'CreateSubir','CreateFisico','CreateOnline'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('delete'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionView() {
        $this->render('view', array(
            'model' => $this->loadModel(),
        ));
    }

    public function actionCreate() {
        $model = new Documentos;

        $this->performAjaxValidation($model);

        if (isset($_POST['Documentos'])) {
            $model->attributes = $_POST['Documentos'];


            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionCreateSubir() {
        $modelMeta = new MetaDocs;
        $modelArchivo = new Archivos;
        
        $this->performAjaxValidation(array($modelMeta, $modelArchivo));

        if (isset($_POST['MetaDocs'], $_POST['Archivos'])) {
            $modelMeta->attributes = $_POST['MetaDocs'];
            $modelArchivo->attributes = $_POST['MetaDocs'];

            $valid = $modelMeta->validate();
            $valid = $modelArchivo->validate() && $valid;

            if ($valid) {
                // guarda modelo de archivos y ys están disponible el nombre, tipo  tamaño
                
                //$modelArchivo->beforeSave();
                $modelArchivo->save(false);
                // asigna el archivo al campo ruta de metadoc
                $modelMeta->ruta=$modelArchivo->id;
                //guarda modelo de metadoc
                $modelMeta->save(false);

                $this->redirect(array('/MetaDocs/view', 'id' => $modelMeta->id));
            }
        }

        $this->render('createSubir', array(
            
            'modelMeta' => $modelMeta,
            'modelArchivo' => $modelArchivo,
        ));
    }
    
     public function actionCreateFisico() {
        $modelMeta = new MetaDocs;

        $this->performAjaxValidation(array($modelMeta));

        if (isset($_POST['MetaDocs'])) {
            
            $modelMeta->attributes = $_POST['MetaDocs'];

            
            $valid = $modelMeta->validate() ;


            if ($valid) {
                //guarda modelo de metadoc
                $modelMeta->save(false);

                $this->redirect(array('/metaDocs/'. $modelMeta->id));
            }
        }

        $this->render('createFisico', array(
            
            'modelMeta' => $modelMeta,
        ));
    }
    
     public function actionCreateOnline() {
        $modelMeta = new MetaDocs;
        $modelA = new Anotaciones;
        $this->performAjaxValidation(array($modelMeta));
        if (isset( $_POST['MetaDocs'],$_POST['Anotaciones'])) {
            $modelMeta->attributes = $_POST['MetaDocs'];
            $modelA->attributes = $_POST['Anotaciones'];
            $valid = $modelMeta->validate();
            $valid = $modelA->validate() && $valid;

            if ($valid) {
                //guarda modelo de metadoc
                $modelMeta->save(false);
                //guarda modelo de anotación
                
                //TODO: ARREGLAR EL id del usuario
                $modelA->usuario=1;
                $modelA->documento=$modelMeta->id; // ES EL ID DE METADOC no de doc.
                $modelA->descripcion=$modelMeta->titulo;
                $modelA->save(false);

                $this->redirect(array('/MetaDocs/view', 'id' => $modelMeta->id));
            }
        }

        $this->render('createOnline', array(
            
            'modelMeta' => $modelMeta,
            'modelA' => $modelA,
        ));
    }

   
    public function actionUpdate() {
        $model = $this->loadModel();

        $this->performAjaxValidation($model);

        if (isset($_POST['Documentos'])) {
            $model->attributes = $_POST['Documentos'];

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete() {
        if (Yii::app()->request->isPostRequest) {
            $this->loadModel()->delete();

            if (!isset($_GET['ajax']))
                $this->redirect(array('index'));
        }
        else
            throw new CHttpException(400,
                    Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Documentos');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Documentos('search');
        if (isset($_GET['Documentos']))
            $model->attributes = $_GET['Documentos'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel() {
        if ($this->_model === null) {
            if (isset($_GET['id']))
                $this->_model = Documentos::model()->findbyPk($_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        }
        return $this->_model;
    }

    protected function performAjaxValidation($models) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'documentos-form') {
            echo CActiveForm::validate($models);
            Yii::app()->end();
        }
    }

}
