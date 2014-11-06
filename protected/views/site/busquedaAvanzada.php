<?php
$this->pageTitle = Yii::app()->name . ' - Index';
$this->breadcrumbs = array(
    'Index',
);
?>

<?php
// encuentra el modelo del usuario actual Yii::app()->user->name
//$modelo_user = Usuarios::model()->findByAttributes(array('Username' => Yii::app()->user->name));
//if (isset($modelo_user)) {
//    if ($modelo_user->esAdministrador) {

        $this->menu = array(
            array('label' => 'Ingresar Documento Físico', 'url' => array('/Documentos/createFisico')),
            array('label' => 'Subir Documento Electrónico', 'url' => array('/Documentos/createSubir')),
            array('label' => 'Crear Documento Online', 'url' => array('/Documentos/createOnline')),
        );
 //   }
//}
        
            // SI ES Busqueda avanzada
    if (isset($_GET['MetaDocs'])) {
        $modelo=new MetaDocs();
        $modelo=$_GET['MetaDocs'];
        print_r($modelo);
        echo $modelo['titulo'];
    }
?>   




<?php $this->setPageTitle('Búsqueda Avanzada de Documentos'); ?>
<div class="form">
    <b></b>
    Por favor introduzca un término, tag, código SAP relacionado o palabras clave
    <br/><br/>
    <?php echo CHtml::form("", 'get', array()); ?>
<?php 
    $model=new MetaDocs();
    $this->renderPartial('/metaDocs/_search',array(
    
	'model'=>$model,
)); ?>
    <?php
//crea el formulario
    echo CHtml::endForm();
    ?>

    <?php
    // si existe el parámetro QUERY
    if (isset($_GET['query'])) {
        //  echo '<div class="forms100c" style="padding-left:15px;padding-bottom:15px;width:600px">';
        echo '<legend>Resultados de la búsqueda</legend>';
        $contador = 0;
        $rutas = array();
        // busca en cada modelo la OT
        // busca en Documentos->descripcion
        $modelos = Documentos::model()->findAllBySql(
                'SELECT id,descripcion FROM documentos WHERE 
                    (descripcion LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->descripcion, 'ruta' => '/index.php/documentos/view/' . $modelo->id, 'ubicacion' => 'Título Documento', 'contenido' => $modelo->descripcion, 'id' => $contador++));
        }

        // busca en Documentos->ISBN
        

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,numComision,titulo FROM metaDocs WHERE 
                    (numComision LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'ubicacion' => 'Número de Comisión', 'contenido' => $modelo->numComision, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,numPedido,titulo FROM metaDocs WHERE 
                    (numPedido LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'ubicacion' => 'Número de Pedido', 'contenido' => $modelo->numPedido, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,titulo FROM metaDocs WHERE 
                    (titulo LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'ubicacion' => 'Título Metadatos', 'contenido' => $modelo->titulo, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,descripcion,titulo FROM metaDocs WHERE 
                    (descripcion LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'ubicacion' => 'Descripción Metadatos', 'contenido' => $modelo->descripcion, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,ruta,titulo FROM metaDocs WHERE 
                    (ruta LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'ubicacion' => 'Ruta documentos', 'contenido' => $modelo->ruta, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,autores,titulo FROM metaDocs WHERE 
                    (autores LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'ubicacion' => 'Autor', 'contenido' => $modelo->autores, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,ISBN,titulo FROM metaDocs WHERE 
                    (ISBN LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'ubicacion' => 'ISBN', 'contenido' => $modelo->ISBN, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,EAN13,titulo FROM metaDocs WHERE 
                    (EAN13 LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'ubicacion' => 'EAN-13', 'contenido' => $modelo->EAN13, 'id' => $contador++));
        }
        $modelos = Anotaciones::model()->findAllBySql(
                'SELECT id,descripcion FROM anotaciones WHERE 
                    (descripcion LIKE "%' . $_GET['query'] . '%")
        ');
        // busca en e
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->descripcion, 'ruta' => '/index.php/anotaciones/view/' . $modelo->id, 'ubicacion' => 'Descripción Anotación', 'contenido' => $modelo->descripcion, 'id' => $contador++));
        }

        $modelos = TablasDeContenido::model()->findAllBySql(
                'SELECT metaDoc,descripcion,indice FROM tablasDeContenido WHERE 
                    (descripcion LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => MetaDocs::model()->findByPk($modelo->metaDoc)->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->metaDoc, 'ubicacion' => 'Tabla de Contenido', 'contenido' => $modelo->indice . " " . $modelo->descripcion, 'id' => $contador++));
        }
        
        $modelos = UbicacionTec::model()->findAllBySql(
                'SELECT id, codigoSAP,descripcion FROM ubicacionTec WHERE 
                    (descripcion LIKE "%' . $_GET['query'] . '%") OR (codigoSAP LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->codigoSAP, 'ruta' => '/index.php/ubicacionTec/view/' . $modelo->id, 'ubicacion' => 'Ubicación Técnica', 'contenido' => $modelo->codigoSAP . " " . $modelo->descripcion, 'id' => $contador++));
        }

        $dataProvider = new CArrayDataProvider($rutas, array(
                    'id' => 'user',
                    'pagination' => array(
                        'pageSize' => 10,
                    ),
                ));

        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'buscar-grid',
            'dataProvider' => $dataProvider,
            // 'filter' => $model,
           'cssFile' => '/themes/gridview/styles.css',     'template'=> '{items}{pager}{summary}',     'summaryText'=>'Resultados del {start} al {end} de {count} encontrados',
            'columns' => array(
                // 'titulo',
                array(// related city displayed as a link
                    'header' => 'Título',
                    'type' => 'raw',
                    'value' => 'CHtml::link((isset($data["titulo"])?$data["titulo"]:""), (isset($data["ruta"])?$data["ruta"]:""))',
                ),
                //     'ruta',
                'ubicacion',
                'contenido',
            ),
        ));

        // para cada resultado
        // echo "</div>";
    }

    
    ?>



</div>




<!--foreach($rutas as $ruta) {
           echo "<br/>".CHtml::link($ruta['ruta'],$ruta['ruta']).' / '.' Ubicación:'.$ruta['ubicacion'].' / '. " Contenido:".$ruta['contenido'];
       }
--->