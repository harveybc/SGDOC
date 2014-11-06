<?php
$this->breadcrumbs = array(
    'Documentos' => array(Yii::t('app', 'index')),
    Yii::t('app', 'Subir usando CSV'),
);
?>
<?php
$this->menu = array(
    array('label' => 'Subir usando CSV', 'url' => array('/metaDocs/subirCSV')),
    array('label' => 'Subir Documento', 'url' => array('/Documentos/createSubir')),
    array('label' => 'Ingresar Doc. Físico', 'url' => array('/Documentos/createFisico')),
    array('label' => 'Crear Doc. Online', 'url' => array('/Documentos/createOnline')),
);
?>    
<?php $this->setPageTitle('Subir documentos usando CSV'); ?>
<div class="forms100c" style="text-align:left;">
    <hr/>
    <b>En Construcción - Instrucciones para migración masiva de documentos a SGDOC:</b><br/>
    <hr/>
    <ol>
        <li>Descargue <a href="/css/CV01_dirs.bat">CV01_dirs.bat</a> (Generador de estructura de directorios para ubicaciones técnicas de la Cervecería del Valle)</li>
        <li>Ejecute <b>CV01_dirs.bat</b> como Administrador, esto crea la estructura de directorios (ubicaciones técnicas) en C:\CV01.</li>
        <li>Puede mover la carpeta C:\CV01 a cualquier otro disco si no tiene espacio en el disco C:</li>
        <li>Copie los documentos a la carpeta de la estructura dentro de C:\CV01 que corresponde a su ubicación técnica, <b>no copie carpetas dentro de la estructura de directorios.</b></li>
        <li>Borre todo el contenido (si existe) de la carpeta compartida llamada CV01_docs ubicada en el servidor CBM en el disco D:</li>
        <li>Copie la carpeta CV01 dentro de la carpeta compartida CV01_docs.</li>
        <li><b>Cuando CV01 esté en la carpeta compartida(con los documentos), </b>descargar <a href="/index.php/MetaDocs/baseCSV">Archivo CSV base.</a>(se genera a partir de la carpeta CV01_docs\CV01)</li>
        <li>El <b>CSV base</b> ya contiene el título y otros datos de cada uno de los archivos de CV01_docs\CV01, edíte el CSV con un editor de texto o MS Excel y modifique títulos, adicione detalles, autores, etc... y guarde los cambios.</li>
        <li>Presione el botón: <b>"Seleccionar archivo"</b> y escoja el archivo CSV modificado.</li>
        <li>Oprima <b>"Aceptar"</b> y siga las instrucciones durante la importación de archivos y finalización del proceso.</li>
    </ol>
    <br/>
    <?php
    $form = $this->beginWidget(
            'CActiveForm', array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            )
    );
// ...
    echo 'Por favor seleccione el archivo <b>CSV</b> y oprima <b>Aceptar</b>';
    echo $form->fileField($model, 'image');
    echo $form->error($model, 'image');
    ?>
    <div class="row buttons" style="margin-left:0.2%;">
    <?php echo CHtml::submitButton(Yii::t('app', 'Aceptar')); ?>
    </div>
        <?php
        $this->endWidget();

        /*
          $this->widget('xupload.XUpload', array(
          'url' => Yii::app()->createUrl("metaDocs/upload"),
          'model' => $model,
          'attribute' => 'file',
          'multiple' => true,
          ));
         * 
         */
        ?>
</div>
