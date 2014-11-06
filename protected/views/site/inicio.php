<style>

    #block_l4_headers,#block_l5_logos,#breadcrumbs_bar
    {
        display: none;
    }
    
    .operaciones,#h_sidebar
    {
        display: none;
    }
    #block_super_headers{
        display:inline-block;
    }
    .logoIzq
    {  
        min-width: 100px;
        text-align: left;
        width:30%;
        float:left;
    }
    .logoDer
    {
        min-width: 100px;
        max-width: 299px;
        text-align: right;
        margin-right:20px;
        width:30%;
        float:right;
        display: inline-block;
    }
    
</style>
<style>
    .operations,.operationsVertical{
        /* display: none; */
    }
    .ui-autocomplete{
        text-align:left;
    }
</style>
    <?php
    Yii::app()->clientScript->registerScript('highlightAC', '$.ui.autocomplete.prototype._renderItem = function (ul, item) {
  item.label = item.label.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + $.ui.autocomplete.escapeRegex(this.term) + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<strong>$1</strong>");
  return $("<li></li>")
  .data("item.autocomplete", item)
  .append("<a>" + item.label + "</a>")
  .appendTo(ul);
  };', CClientScript::POS_END);
    ?><?php
$this->pageTitle = Yii::app()->name . ' - Index';
$this->breadcrumbs = array(
    'Inicio',
);


?>

<?php
// encuentra el modelo del usuario actual Yii::app()->user->name
//$modelo_user = Usuarios::model()->findByAttributes(array('Username' => Yii::app()->user->name));
//if (isset($modelo_user)) {
//    if ($modelo_user->esAdministrador) {

        $this->menu = array(
            array('label' => 'Subir usando CSV', 'url' => array('/metaDocs/subirCSV')),
            array('label' => 'Subir Documento', 'url' => array('/Documentos/createSubir')),
            array('label' => 'Ingresar Doc. Físico', 'url' => array('/Documentos/createFisico')),
            array('label' => 'Crear Doc. Online', 'url' => array('/Documentos/createOnline')),
        );
 //   }
//}
?>    




<?php $this->setPageTitle('Búsqueda de Documentos'); ?>
<div class="form" style="text-align:left;">
    <b></b>
    Por favor introduzca un término, tag, autor, id, código SAP relacionado o palabras clave
    <br/><br/>
    <?php echo CHtml::form("", 'get', array()); ?>
<div style="width:50%;padding:0px;margin:0px;text-align:left;">
    <?php
// Si existe el parámetro $_GET[OT]
            
// lee valores de get desde
    $model=new MetaDocs();
    $modeloValue = '';
            if (isset($_GET['query'])) {
                $modeloValue=$_GET['query'];
            }
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'name' => 'query',
                'source' => CController::createUrl('metaDocs/tituloSearch'),
                'options' => array(
                    'minLength' => '1',
                    //'select' => 'js:function(event, ui) { console.log(ui.item.id +":"+ui.item.value); }',
                ),
                'htmlOptions' => array(
                    'style' => 'width:100%; text-align:left;'
                ),
                'model' => $model,
                'value' => $modeloValue,
            ));
                
    
    //echo CHtml::textField('query', isset($_GET['query']) ? $_GET['query'] : "", array("style"=>"width:300px;"));
    ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('app', 'Aceptar')); ?>
        <a href='/index.php/metaDocs/admin?avanzada=1' style="margin-left:10px;">Búsqueda Avanzada</a>
</div>
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
        /*
        $modelos = Documentos::model()->findAllBySql(
                'SELECT id,descripcion FROM documentos WHERE 
                    (descripcion LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->descripcion, 'ruta' => '/index.php/documentos/view/' . $modelo->id, 'md_id'=>(isset($modelo->ruta)?((($modelo->ruta>0)||(!is_numeric($modelo->ruta)))?'Electrónico':'Físico'):'Físico'), 'ubicacion' => 'Título U.Docum', 'contenido' => $modelo->descripcion, 'id' => $contador++));
        }
*/
        // busca en Documentos->ISBN
        //$es_fisico=isset($model->ruta)?((($model->ruta>0)||(!is_numeric($model->ruta)))?0:1):1;

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,numComision,titulo,ruta FROM metaDocs WHERE 
                    (numComision LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'md_id'=>(isset($modelo->ruta)?((($modelo->ruta>0)||(!is_numeric($modelo->ruta)))?'Electrónico':'Físico'):'Físico'), 'ubicacion' => 'Número de Comisión', 'contenido' => $modelo->numComision, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,numPedido,titulo,ruta FROM metaDocs WHERE 
                    (numPedido LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'md_id'=>(isset($modelo->ruta)?((($modelo->ruta>0)||(!is_numeric($modelo->ruta)))?'Electrónico':'Físico'):'Físico'), 'ubicacion' => 'Número de Pedido', 'contenido' => $modelo->numPedido, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,titulo,ruta FROM metaDocs WHERE 
                    (titulo LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'md_id'=>(isset($modelo->ruta)?((($modelo->ruta>0)||(!is_numeric($modelo->ruta)))?'Electrónico':'Físico'):'Físico'.$modelo->ruta), 'ubicacion' => 'Título', 'contenido' => $modelo->titulo, 'id' => $contador++));
            //array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'md_id'=>'ok', 'ubicacion' => 'Título', 'contenido' => $modelo->titulo, 'id' => $contador++));            
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,descripcion,titulo,ruta FROM metaDocs WHERE 
                    (descripcion LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'md_id'=>(isset($modelo->ruta)?((($modelo->ruta>0)||(!is_numeric($modelo->ruta)))?'Electrónico':'Físico'):'Físico'), 'ubicacion' => 'Descripción', 'contenido' => $modelo->descripcion, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,ruta,titulo,ruta FROM metaDocs WHERE 
                    (ruta LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'md_id'=>(isset($modelo->ruta)?((($modelo->ruta>0)||(!is_numeric($modelo->ruta)))?'Electrónico':'Físico'):'Físico'), 'ubicacion' => 'Ruta', 'contenido' => $modelo->descripcion, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,autores,titulo,ruta FROM metaDocs WHERE 
                    (autores LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'md_id'=>(isset($modelo->ruta)?((($modelo->ruta>0)||(!is_numeric($modelo->ruta)))?'Electrónico':'Físico'):'Físico'), 'ubicacion' => 'Autor', 'contenido' => $modelo->autores, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,ISBN,titulo,ruta FROM metaDocs WHERE 
                    (ISBN LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'md_id'=>(isset($modelo->ruta)?((($modelo->ruta>0)||(!is_numeric($modelo->ruta)))?'Electrónico':'Físico'):'Físico'), 'ubicacion' => 'ISBN', 'contenido' => $modelo->ISBN, 'id' => $contador++));
        }

        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id,EAN13,titulo,ruta FROM metaDocs WHERE 
                    (EAN13 LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'md_id'=>(isset($modelo->ruta)?((($modelo->ruta>0)||(!is_numeric($modelo->ruta)))?'Electrónico':'Físico'):'Físico'), 'ubicacion' => 'EAN-13', 'contenido' => $modelo->EAN13, 'id' => $contador++));
        }
       /* $modelos = Anotaciones::model()->findAllBySql(
                'SELECT id,descripcion FROM anotaciones WHERE 
                    (descripcion LIKE "%' . $_GET['query'] . '%")
        ');
        // busca en e
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->descripcion, 'ruta' => '/index.php/anotaciones/view/' . $modelo->id, 'md_id'=>(isset($modelo->ruta)?((($modelo->ruta>0)||(!is_numeric($modelo->ruta)))?'Electrónico':'Físico'):'Físico'), 'ubicacion' => 'Descripción Anotación', 'contenido' => $modelo->descripcion, 'id' => $contador++));
        }

*/
        $modelos = TablasDeContenido::model()->findAllBySql(
                'SELECT metaDoc,descripcion,indice FROM tablasDeContenido WHERE 
                    (descripcion LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            $tmp_hbc= MetaDocs::model()->findByPk($modelo->metaDoc);
            if (isset($tmp_hbc)){
                array_push($rutas, array('titulo' =>$tmp_hbc->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->metaDoc, 'md_id'=>(isset($tmp_hbc->ruta)?((($tmp_hbc->ruta>0)||(!is_numeric($tmp_hbc->ruta)))?'Electrónico':'Físico'):'Físico'), 'ubicacion' => 'Tabla de Contenido', 'contenido' => $modelo->indice . " " . $modelo->descripcion, 'id' => $contador++));
                }
        }
        
        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id, titulo,descripcion,ruta FROM metaDocs WHERE 
                    id="'.$_GET['query'].'"'
        );
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'md_id'=>(isset($modelo->ruta)?((($modelo->ruta>0)||(!is_numeric($modelo->ruta)))?'Electrónico':'Físico'):'Físico'), 'ubicacion' => 'Id', 'contenido' => $modelo->titulo . " " . $modelo->descripcion, 'id' => $contador++));
        }
// Para ubicaciones técnicas
        $modelos = MetaDocs::model()->findAllBySql(
                'SELECT id, titulo,descripcion,ruta FROM metaDocs WHERE 
                    (ubicacionT_str LIKE "%' . $_GET['query'] . '%")
        ');
        // para cada resultado
        foreach ($modelos as $modelo) {
            array_push($rutas, array('titulo' => $modelo->titulo, 'ruta' => '/index.php/metaDocs/view/' . $modelo->id, 'md_id'=>(isset($modelo->ruta)?((($modelo->ruta>0)||(!is_numeric($modelo->ruta)))?'Electrónico':'Físico'):'Físico'), 'ubicacion' => 'Ubicación T.', 'contenido' => $modelo->titulo . " " . $modelo->descripcion, 'id' => $contador++));
        }
        
        $dataProvider = new CArrayDataProvider($rutas, array(
                    'id' => 'user',
                    'pagination' => array(
                        'pageSize' => 20,
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
                
                array(// related city displayed as a link
                    'header' => 'Tipo',
                    'type' => 'raw',
                    'value' => 'CHtml::link((isset($data["md_id"])?$data["md_id"]:""), (isset($data["ruta"])?$data["ruta"]:""))',
                ), 
                array(// related city displayed as a link
                    'header' => 'Metadato',
                    'type' => 'raw',
                    'value' => 'CHtml::link((isset($data["ubicacion"])?$data["ubicacion"]:""), (isset($data["ruta"])?$data["ruta"]:""))',
                ),
                
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