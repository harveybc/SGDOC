<?php
$this->breadcrumbs = array(
    'Documentos' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Solicitar Préstamo', 'url' => array('/Prestamos/create?id=' . $model->id)),
    array('label' => 'Lista de Documentos', 'url' => array('index')),
    array('label' => 'Ingresar Doc. Físico', 'url' => array('/Documentos/createFisico')),
    array('label' => 'Subir Doc. Electrónico', 'url' => array('/Documentos/createSubir')),
    array('label' => 'Crear Doc. Online', 'url' => array('/Documentos/createOnline')),
    array('label' => 'Actualizar Documento', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Borrar Documento', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Está seguro de borrar esto??')),
    array('label' => 'Gestionar Documentos', 'url' => array('admin')),
);
?>

<?php $this->setPageTitle($model->titulo); ?>
<?php
$fisico = 1;

if (isset($model->ruta))
    if (($model->ruta>0)||(!is_numeric($model->ruta))) {
      //echo $model->ruta;
        //  echo 'Descargar archivo: <a href="/index.php/Archivos/displayArchivo?id=' . $model->ruta . '">' . $model->ruta0->nombre . ' - ' . $model->ruta0->tamano . ' Bytes </a>';

        echo sprintf('<a href="/index.php/%s">Descargar archivo</a>',
            (is_numeric($model->ruta)?
                    ("archivos/displayArchivo?id=".$model->ruta):("metaDocs/passthru?path=".urlencode($model->ruta)))
        );
        $fisico = 0;
       //echo "HEREruta=".$fisico;
  }
?>

<?php
$modelA = Anotaciones::model()->findBySQL("select * from anotaciones where documento=" . $model->id);
if (isset($modelA)) {
        echo '<b> Documento en Línea (
                <a href="/index.php/anotaciones/update/' . $modelA->id . '">Editar</a>
                , <a href="/index.php/anotaciones/displayArchivo?id=' . $modelA->id . '">Descargar</a>): </b>';

    $fisico = 0;
   // echo "HEREanotac=".$fisico;
}

?>
<div class="forms100c" style="text-align: center;">
    <div class="forms50c"  style="text-align:left;">
        <?php
        //echo "HERE=".$fisico;
        if ($fisico == 1) {
            echo '
        <b>Ubicación física</b>
    <span style="color:#333333">';

            $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'cssFile' => '/themes/detailview/styles.css',
                'attributes' => array(
                    //	'id',
                    'modulo',
                    'columna',
                    'fila',
                    'disponibles',
                    'existencias',
                    )));

            echo '</span>';
        }
        ?>


        <b>Detalles</b>
        <span style="color:#333333">
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'cssFile' => '/themes/detailview/styles.css',
                'attributes' => array(
                    //	'id',
                    'descripcion',
                    'ubicacionT_str',
                    'autores',
                    'version',
                    'tipoContenido0.descripcion',
                    'fabricante0.descripcion',
                    'medio0.descripcion',
                    'idioma0.descripcion',
                    'cerveceria0.descripcion',
                    'numPedido',
                    'numComision',
                    'EAN13',
                ),
            ));
            ?>
        </span>
    </div>
    <div class="forms50c"  style="text-align:left;">
        <b> Tabla de Contenido: </b>
        <div class="forms100cb" style="text-align:left;">
            <ul>
                <?php
                foreach ($model->tablasDeContenidos as $foreignobj) {

                    printf('<li>%s</li>', CHtml::link($foreignobj->indice . " - " . $foreignobj->descripcion, array('tablasDeContenido/view', 'id' => $foreignobj->id)));
                }
                printf('%s', CHtml::link("Agregar entrada a tabla de contenido", array('tablasDeContenido/create', 'id' => $model->id)));
                ?>
            </ul>
        </div>

        
        <?php
        if ($fisico == 1) {
            echo '<b>Historial de prestamos de este documento: </b>
             <div class="forms100cb" style="text-align:left;"><ul>';

            foreach ($model->prestamoses as $foreignobj) {

                printf('<li>%s</li>', CHtml::link($foreignobj->fechaPrestamo, array('prestamos/view', 'id' => $foreignobj->id)));
            }
            printf('%s', CHtml::link("Solicitar Préstamo", array('prestamos/create', 'id' => $model->id)));
            echo '</ul></div>';
        }
        
        


        if (isset($modelA)) {                    
                     echo '<b>Previsualización</b>
                <div class="forms100cb"  style="text-align:left;">
                
                <span style="color:#000000;">';
    
    echo $modelA->contenido;
    echo '</span>
                    </div>';
}
        ?>
        
    </div>
    <br />
</div>


