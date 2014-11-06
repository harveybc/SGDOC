<?php

class MetaDocsController extends Controller {

    public $layout = '//layouts/column2';
    private $_model;

    public function actions() {
        return array(
            'upload' => array(
                'class' => 'xupload.actions.XUploadAction',
                'path' => Yii::app()->getBasePath() . "/../uploads",
                'publicPath' => Yii::app()->getBaseUrl() . "/uploads",
            ),
        );
    }

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'view', 'tituloSearch', 'autoresSearch', 'descripcionSearch', 'numPedidoSearch', 'numComisionSearch', 'passthru'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('admin', 'create', 'update', 'migrar', 'subirMultiCSV', 'subirCSV', 'baseCSV'),
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
        $model = new MetaDocs;

        $this->performAjaxValidation($model);

        if (isset($_POST['MetaDocs'])) {
            $model->attributes = $_POST['MetaDocs'];


            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate() {
        $model = $this->loadModel();

        $this->performAjaxValidation($model);

        if (isset($_POST['MetaDocs'])) {
            $model->attributes = $_POST['MetaDocs'];

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
        $dataProvider = new CActiveDataProvider('MetaDocs');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new MetaDocs('search');
        if (isset($_GET['MetaDocs']))
            $model->attributes = $_GET['MetaDocs'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel() {
        if ($this->_model === null) {
            if (isset($_GET['id']))
                $this->_model = MetaDocs::model()->findbyPk($_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        }
        return $this->_model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'meta-docs-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionMigrar() {
        $modelos = MetaDocs::model()->findAll();
        foreach ($modelos as $modelo) {
            // fabricante
            $modelTMP = Fabricantes::model()->findBySQL('select * from fabricantes where descripcion="' . $modelo->fabricante_str . '"');
            $modelo->fabricante = isset($modelTMP) ? $modelTMP->id : 1;
            // ubicacionT
            $modelTMP = UbicacionTec::model()->findBySQL('select * from ubicacionTec where descripcion="' . $modelo->ubicacionT_str . '"');
            $modelo->ubicacionT = isset($modelTMP) ? $modelTMP->id : 1;
            // tipoContenido
            $modelTMP = TipoContenidos::model()->findBySQL('select * from tipoContenidos where descripcion="' . $modelo->tipoContenido_str . '"');
            $modelo->tipoContenido = isset($modelTMP) ? $modelTMP->id : 1;
            // medio
            $modelTMP = Medios::model()->findBySQL('select * from medios where descripcion="' . $modelo->medio_str . '"');
            $modelo->medio = isset($modelTMP) ? $modelTMP->id : 1;
            $modelo->save();
            echo '<h1>DONE</h1>';
        }
    }

    public function actionTituloSearch($term) {
        // TODO: Arreglar para que busque también cuando se tecleé el nombre, si conviene.
        //$sql = 'SELECT docIdent FROM clientes WHERE docIdent LIKE \'%' . trim($term) . '%\' LIMIT 10';
        $sql = 'SELECT distinct titulo as label, titulo as value FROM metaDocs WHERE titulo LIKE :qterm ORDER BY titulo ASC LIMIT 10';
//        $sql = 'SELECT docIdent FROM clientes WHERE docIdent LIKE \'%94%\' LIMIT 10';
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%' . $_GET['term'] . '%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result = $command->queryAll();
        echo CJSON::encode($result);
        exit;
    }

    public function actionAutoresSearch($term) {
        // TODO: Arreglar para que busque también cuando se tecleé el nombre, si conviene.
        //$sql = 'SELECT docIdent FROM clientes WHERE docIdent LIKE \'%' . trim($term) . '%\' LIMIT 10';
        $sql = 'SELECT distinct autores as label, autores as value FROM metaDocs WHERE autores LIKE :qterm ORDER BY autores ASC LIMIT 10';
//        $sql = 'SELECT docIdent FROM clientes WHERE docIdent LIKE \'%94%\' LIMIT 10';
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%' . $_GET['term'] . '%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result = $command->queryAll();
        echo CJSON::encode($result);
        exit;
    }

    public function actionDescripcionSearch($term) {
        // TODO: Arreglar para que busque también cuando se tecleé el nombre, si conviene.
        //$sql = 'SELECT docIdent FROM clientes WHERE docIdent LIKE \'%' . trim($term) . '%\' LIMIT 10';
        $sql = 'SELECT distinct descripcion as label, descripcion as value FROM metaDocs WHERE descripcion LIKE :qterm ORDER BY descripcion ASC LIMIT 10';
//        $sql = 'SELECT docIdent FROM clientes WHERE docIdent LIKE \'%94%\' LIMIT 10';
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%' . $_GET['term'] . '%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result = $command->queryAll();
        echo CJSON::encode($result);
        exit;
    }

    public function actionNumPedidoSearch($term) {
        // TODO: Arreglar para que busque también cuando se tecleé el nombre, si conviene.
        //$sql = 'SELECT docIdent FROM clientes WHERE docIdent LIKE \'%' . trim($term) . '%\' LIMIT 10';
        $sql = 'SELECT distinct numPedido as label, numPedido as value FROM metaDocs WHERE numPedido LIKE :qterm ORDER BY numPedido ASC LIMIT 10';
//        $sql = 'SELECT docIdent FROM clientes WHERE docIdent LIKE \'%94%\' LIMIT 10';
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%' . $_GET['term'] . '%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result = $command->queryAll();
        echo CJSON::encode($result);
        exit;
    }

    public function actionNumComisionSearch($term) {
        // TODO: Arreglar para que busque también cuando se tecleé el nombre, si conviene.
        //$sql = 'SELECT docIdent FROM clientes WHERE docIdent LIKE \'%' . trim($term) . '%\' LIMIT 10';
        $sql = 'SELECT distinct numComision as label, numComision as value FROM metaDocs WHERE numComision LIKE :qterm ORDER BY numComision ASC LIMIT 10';
//        $sql = 'SELECT docIdent FROM clientes WHERE docIdent LIKE \'%94%\' LIMIT 10';
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%' . $_GET['term'] . '%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result = $command->queryAll();
        echo CJSON::encode($result);
        exit;
    }

    public function actionPassthru() {
        //$file = urldecode($_GET['path']);
        $file = utf8_decode(urldecode($_GET['path']));
        $fileant = $file;

        $fallback = 'c:\\wamp\\www\\images\\fallback.gif';

//DETERMINE TYPE
        $ext = array_pop(explode('.', $file));
        $image = array_pop(explode('\\', $file));
        
        $allowed['gif'] = 'image/gif';
        $allowed['png'] = 'image/png';
        $allowed['jpg'] = 'image/jpeg';
        $allowed['jpeg'] = 'image/jpeg';
        $allowed['pdf'] = 'application/pdf';
        $allowed['doc'] = 'application/doc';
        $allowed['docx'] = 'application/docx';
        $allowed['prj'] = 'application/prj';
        $allowed['zip'] = 'application/zip';
        $allowed['rar'] = 'application/rar';
        $allowed['xls'] = 'application/xls';
        $allowed['xlsx'] = 'application/xlsx';
        $allowed['txt'] = 'application/txt';
        $allowed['ff2'] = 'application/ff2';
        $allowed['dwg'] = 'application/dwg';
        $allowed['log'] = 'application/log';
        
        
        if (file_exists($file) && $ext != '' && isset($allowed[strToLower($ext)])) {
            $type = $allowed[strToLower($ext)];
            ob_clean();
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Content-Transfer-Encoding: binary');
            header('Content-length: ' . filesize($file));
            header('Content-Type: ' . $type);
            header('Content-Disposition: attachment; filename=' . $image);
            //echo $fileant;
            @readfile($file);
        } else {
            $file = $fallback;

            $type = 'image/gif';
            ob_clean();
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Content-Transfer-Encoding: binary');
            header('Content-length: ' . filesize($file));
            header('Content-Type: ' . $type);
            header('Content-Disposition: attachment; filename=' . $image);
            //echo $fileant;
            @readfile($file);
        }
        exit();
    }

    public function actionSubirMultiCSV() {
        Yii::import("xupload.models.XUploadForm");
        $model = new XUploadForm;
        $this->render('multiupload_inicio', array('model' => $model,));
    }

    public function actionSubirCSV() {
        $model = new MetaDocs;
        if (isset($_POST['MetaDocs'])) {
            $model->attributes = $_POST['MetaDocs'];
            $model->image = CUploadedFile::getInstance($model, 'image');
            $model->image->saveAs(Yii::getPathOfAlias('webroot') . "/uploads/tmp.csv");
            $this->render('multiupload_verify');
        }
        $this->render('multiupload_inicio', array('model' => $model));
    }

    function actionBaseCSV() {

        function dir_tree($dir) {
            $path = '';
            $stack[] = $dir;
            while ($stack) {
                $thisdir = array_pop($stack);
                if ($dircont = scandir($thisdir)) {
                    $i = 0;
                    while (isset($dircont[$i])) {
                        if ($dircont[$i] !== '.' && $dircont[$i] !== '..') {
                            $current_file = "{$thisdir}/{$dircont[$i]}";
                            if (is_file($current_file)) {
                                $path[] = "{$thisdir}/{$dircont[$i]}";
                            } elseif (is_dir($current_file)) {
                                $path[] = "{$thisdir}/{$dircont[$i]}";
                                $stack[] = $current_file;
                            }
                        }
                        $i++;
                    }
                }
            }
            return $path;
        }

        // ejecuta comando para obtener lista de archivos desde carpeta compartida
        exec('dir /aa /s /b D:\CV01_docs\CV01 > c:\wamp\www\sgdoc\css\tmp_file_list.txt');
        // TODO: EJECUTA dir_tree('D:\CV01_docs\CV01'); e imprime resultado
        $results = dir_tree('D:\CV01_docs\CV01');
        foreach ($results as $result) {
            echo '<br/>' . $result;
        }

        $arrFilas = array();
        array_push($arrFilas, "id;tipoContenido;fabricante;cerveceria;numPedido;numComision;ubicacionT;descripcion;titulo;version;medio;idioma;disponibles;existencias;modulo;columna;fila;documento;ruta;fechaCreacion;fechaRecepcion;autores;usuario;revisado;userRevisado;fechaRevisado;eliminado;secuencia;ordenSecuencia;ISBN;EAN13;carpeta;fabricante_str;ubicacionT_str;tipoContenido_str;medio_str
");
        // lee la lista en un arreglo
        //$file=file('c:\wamp\www\sgdoc\css\tmp_file_list.txt');
        $file = $results;
        foreach ($file as $num => $line) {
            // obtiene el filename y dirname
            $path_parts = pathinfo($line);

            //echo $path_parts['dirname'], "\n";
            //echo $path_parts['filename'], "\n"; // since PHP 5.2.0

            $u_tec = str_replace("D:\\CV01_docs\\", "", $path_parts['dirname']);
            //agregado por h.20120809
            $u_tec = str_replace("/", "\\", $u_tec);
            $u_tec = str_replace("\\", "\\\\", $u_tec);
            $u_tec = str_replace("\n", "", $u_tec);
            $u_tec = str_replace(chr(13), "", $u_tec);
            $fullname = str_replace("\\", "\\\\", $line);
            //agregado por h.20120809
            $fullname = str_replace("/", "\\\\", $fullname);
            $fullname = str_replace("\n", "", $fullname);
            $fullname = str_replace(chr(13), "", $fullname);
            $filename = str_replace("\n", "", $path_parts['filename']);
            //agregado por h.20120809
            $filename = str_replace("/", "\\\\", $filename);
            $filename = str_replace(chr(13), "", $filename);
            // adiciona una línea al CSV de salida
            if (!is_dir($fullname)) { // note: three equal signs
                array_push($arrFilas, ';;;1;;;;' . $filename . ';' . $filename . ';;;;;;;;;;' . $fullname . ';;;;;;;;;;;;;;;' . $u_tec . ';;' . chr(13));
            }
        }
        // guarda el arreglo en un csv
        $file = 'c:\wamp\www\sgdoc\css\csv_base.csv';
        file_put_contents($file, $arrFilas);
        //  file_put_contents($file, $results);
        //application/pdf
        ob_clean();
        $file = 'c:\wamp\www\sgdoc\css\csv_base.csv';
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: text');
        header('Content-length: ' . filesize($file));
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="csv_base.csv"');
        @readfile($file);
    }

}

