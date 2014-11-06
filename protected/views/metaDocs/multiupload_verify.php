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
    <b>En Construcción - Verificación de Archivos:</b><br/>
    <hr/>
    Por favor espere mientras se verifican y se suben los archivos listados en el CSV
    <br/>
    <?php
    // carga e csv en un arreglo
    ini_set("auto_detect_line_endings", true);
    //$file = file('c:\\wamp\\www\\sgdoc\\uploads\\tmp.csv');
    $fileFull = file_get_contents('c:\\wamp\\www\\sgdoc\\uploads\\tmp.csv');
    $file = explode("\x0A", $fileFull);
    // copia archivos a root
    $count_bueno = 0;
    $count_error = 0;
    $count = 0;
    $array_out=array();
    //$modelo = new MetaDocs;    
    
    //exec('xcopy /E /Q /Y /R d:\\CV01_docs\\CV01\\*.* d:\\CBM\\CV01');
                        $connection = yii::app()->db;

    foreach ($file as $num => $line) {
        if ($count > 0) {
            //verifica que no exista la misma ruta
            $modelo_arr = str_getcsv(utf8_encode($line), ";");
            // TODO: Verificar que no se repitan con caractéres imternacionales.
            if (isset($modelo_arr[18])){
                $sql2='select * from metaDocs where ruta="'.str_replace("CV01_docs", "CBM", $modelo_arr[18]).'"';
                $modelo_1 = MetaDocs::model()->findBySql($sql2);
                //echo "<br/>".$sql2."<br/>";
                if (!isset($modelo_1)){
    $sql='INSERT INTO metaDocs (cerveceria,descripcion,titulo,ruta,ubicacionT_str)
                        VALUES("'.$modelo_arr[3].'","'.$modelo_arr[7].'","'.$modelo_arr[8].'","'.str_replace("CV01_docs", "CBM", $modelo_arr[18]).'","'.$modelo_arr[33].'")';
$command=$connection->createCommand($sql);
$command->execute();
                   echo utf8_encode($modelo_arr[18]).'..OK.<br/>';
                    //echo $sql;
             
                
                }
                else 
                    {
                    echo "Duplicado Encontrado, saltando archivo ".$modelo_arr[18].".<br/>";
                    $count--;
                    }
             }
            //array_push($array_out, str_replace("CV01_docs", "CBM", $line));
            
           
            
            
        }
        echo $count.',';
        $count++;
        

    }

    ?>
    <br/>
    <!--Se importaron <?php echo $count; ?> archivos, --->Archivos Importados. Haga click <a href="/index.php/site/inicio">aquí para volver al Inicio.</a>
    <?php echo Yii::getPathOfAlias('webroot') . "/uploads/tmp.csv"; ?>
</div>
