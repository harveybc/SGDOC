<style type="text/css">

    .tableDoc{
        width:888px; 
        vertical-align:middle;

    }
   table{
            width:888px; 
            vertical-align:middle;
            margin:0px;
            padding:0px;

        }


    .table2{
        width:888px; 

        vertical-align:middle;


    }

    .marcoDoc{

        width:888px !important;
       
        margin-bottom:5px !important;
        border-color:#961C1F;
        padding-top:5px;
        padding-right:5px;
        padding-left:14px;
        -moz-border-radius: 7px; /* Firefox */
        -webkit-border-radius: 7px; /* Safari and Chrome */
        -border-radius: 7px; /* Opera 10.5+, future browsers, and now also Internet Explorer 6+ using IE-CSS3 */
    }

    .marcoMeta {

        width:888px !important;
        
        margin:0px !important;
        border-color:#961C1F;
        padding:0px;
        -moz-border-radius: 7px; /* Firefox */
        -webkit-border-radius: 7px; /* Safari and Chrome */
        -border-radius: 7px; /* Opera 10.5+, future browsers, and now also Internet Explorer 6+ using IE-CSS3 */

    }

    .marcoMeta2 {

        width:888px !important;
    
        margin:0px !important;
        border-color:#961C1F;
        padding:0px;
        -moz-border-radius: 7px; /* Firefox */
        -webkit-border-radius: 7px; /* Safari and Chrome */
        -border-radius: 7px; /* Opera 10.5+, future browsers, and now also Internet Explorer 6+ using IE-CSS3 */

    }
    
    .secuenciaDoc{

        width: 150px;

    }

    .secuencias{

        width: 150px;

    }
    .secuencias2{

        width: 250px;
        padding:0px
       

    }
    td{

            padding:0px;
            margin:0px;

        }



</style>

<script>
    function cambiarTitulo(){
        
        var conv=$('#Documentos_descripcion').attr('value');
        $('#MetaDocs_titulo').attr('value',conv);
    }
</script>


<br/>

<?php
    if (0+$panel==0)
    {
?>


<div class="forms100cb" class="tableDoc">
        <div class="forms100c">
            <div class="forms50c" >           
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'descripcion'); ?>
                    <?php echo $form->textField($model, 'descripcion', array('size' => 60, 'maxlength' => 128, 'style' => 'width:250px', 'onchange' => 'cambiarTitulo()')); ?>
                    <?php echo $form->error($model, 'descripcion'); ?>
                </div>
            </div>
             <div class="forms50c"  style="padding-left:25px">
                <label for="UbicacionTec">Ubicación Técnica</label><?php
                $this->widget('application.components.Relation', array(
                    'model' => $modelMeta,
                    'relation' => 'ubicacionT0',
                    'fields' => 'codigoSAP',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'class' => 'secuencias2',)
                        )
                );
            ?>
            </div>
            <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'autores'); ?>
                    <?php echo $form->textField($modelMeta, 'autores', array('size' => 60, 'maxlength' => 256, 'style' => 'width:250px')); ?>
                    <?php echo $form->error($modelMeta, 'autores'); ?>
                </div>

            </div>
            </div>
            </div>
<div class="forms100cb">
            <div class="forms100c">
   
             <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'modulo'); ?>
                    <?php echo $form->textField($modelMeta, 'modulo', array('style' => 'width:20px;padding-left:20px')); ?>
                    <?php echo $form->error($modelMeta, 'modulo'); ?>
                </div>
            </div>
            <div class="forms50c">

                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'columna'); ?>
                    <?php echo $form->textField($modelMeta, 'columna', array('style' => 'width:20px')); ?>
                    <?php echo $form->error($modelMeta, 'columna'); ?>
                </div>


            </div>
            <div class="forms50c" style="padding-right:30px">
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'fila'); ?>
                    <?php echo $form->textField($modelMeta, 'fila', array('style' => 'width:20px')); ?>
                    <?php echo $form->error($modelMeta, 'fila'); ?>
                </div>
            </div>
           
         
<div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'disponibles'); ?>
                    <?php echo $form->textField($modelMeta, 'disponibles', array('style' => 'width:100px')); ?>
                    <?php echo $form->error($modelMeta, 'disponibles'); ?>
                </div>
            </div>
          
            <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'existencias'); ?>
                    <?php echo $form->textField($modelMeta, 'existencias', array('style' => 'width:100px')); ?>
                    <?php echo $form->error($modelMeta, 'existencias'); ?>
                </div>
            </div>
            
            <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'ISBN'); ?>
                    <?php echo $form->textField($modelMeta, 'ISBN', array('size' => 32, 'maxlength' => 32, 'style' => 'width:100px')); ?>
                    <?php echo $form->error($modelMeta, 'ISBN'); ?>
                </div>
            </div>
            <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'EAN13'); ?>
                    <?php echo $form->textField($modelMeta, 'EAN13', array('size' => 32, 'maxlength' => 32, 'style' => 'width:100px')); ?>
                    <?php echo $form->error($modelMeta, 'EAN13'); ?>
                </div>
            </div>
            



            
        </div>
    </div>

<?php
    }
   
    if (0+$panel==1)
    {
     ?>

 <div class="forms100cb" class="table">
        <div class="forms100c">

            <div class="forms50c">
                  <?php echo $form->hiddenField($modelMeta, 'titulo', array('size' => 60, 'maxlength' => 256, 'style' => 'width:150px')); ?>
                    <?php echo $form->error($modelMeta, 'titulo'); ?>
               
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'descripcion'); ?>
                    <?php echo $form->textArea($modelMeta, 'descripcion', array('size' => 60, 'maxlength' => 256, 'style' => 'width:150px')); ?>
                    <?php echo $form->error($modelMeta, 'descripcion'); ?>
                </div>

            </div>

            <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'numPedido'); ?>
                    <?php echo $form->textField($modelMeta, 'numPedido', array('size' => 60, 'maxlength' => 64, 'style' => 'width:150px')); ?>
                    <?php echo $form->error($modelMeta, 'numPedido'); ?>
                </div>
            </div>
            <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'numComision'); ?>
                    <?php echo $form->textField($modelMeta, 'numComision', array('size' => 60, 'maxlength' => 64, 'style' => 'width:150px')); ?>
                    <?php echo $form->error($modelMeta, 'numComision'); ?>
                </div>                
            </div>
            <div class="forms50c">
                 <?php echo $form->labelEx($modelMeta, 'fechaRecepcion'); ?>
                <?php
//Fecha inicial
                $today = date("Y-m-d H:i:s");
                if (isset($modelMeta->fechaRecepcion))
                    $today = $modelMeta->fechaRecepcion;
                else
                    $modelMeta->fechaRecepcion= $today;
//fin Fecha inicial
                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker', array(
                    'model' => $modelMeta, //Model object
                    'attribute' => 'fechaRecepcion', //attribute name
                    'mode' => 'datetime', //use "time","date" or "datetime" (default)
                    'language' => 'es',
                    //    'value' =>$today,
                    'themeUrl' => '/themes',
                    'theme' => 'calendariocbm',
                    'htmlOptions'=>array('style'=>'width:140px;'),
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                        'showButtonPanel' => true,
                        "yearRange" => '1995:2070',
                        'changeYear' => true,
                        'buttonImage' => '/images/calendar.png',
                        'showOn' => "both",
                        'buttonText' => "Seleccione la fecha",
                        'buttonImageOnly' => true,
                    ) // jquery plugin options
                ));
                ?>
            </div> 
            

            
        </div>
    
        <div class="forms100c">
             <div class="forms50c">
                <label for="Fabricantes">Fabricante</label><?php
                $this->widget('application.components.Relation', array(
                    'model' => $modelMeta,
                    'relation' => 'fabricante0',
                    'fields' => 'descripcion',
                    'allowEmpty' => false,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'class' => 'secuencias',)
                        )
                );
                    ?>
            </div>
            

<div class="forms50c">
                <label for="Idiomas">Idioma</label><?php
                $this->widget('application.components.Relation', array(
                    'model' => $modelMeta,
                    'relation' => 'idioma0',
                    'fields' => 'descripcion',
                    'allowEmpty' => false,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'class' => 'secuencias',)
                        )
                );
            ?>
            </div>
            <div class="forms50c">
                <label for="Cervecerias">Cerveceria </label><?php
                    $this->widget('application.components.Relation', array(
                        'model' => $modelMeta,
                        'relation' => 'cerveceria0',
                        'fields' => 'descripcion',
                        'allowEmpty' => true,
                        'style' => 'dropdownlist',
                        'htmlOptions' => array(
                            'class' => 'secuencias',)
                            )
                    );
                    ?>

            </div>

           
 
           
            <div class="forms50c">
                 <?php echo $form->hiddenField($modelMeta, 'documento', array('value' => 1)); ?>
                
                
                <label for="TipoContenidos">Tipo de Contenido</label><?php
            $this->widget('application.components.Relation', array(
                'model' => $modelMeta,
                'relation' => 'tipoContenido0',
                'fields' => 'descripcion',
                'allowEmpty' => false,
                'style' => 'dropdownlist',
                'htmlOptions' => array(
                    'class' => 'secuencias',)
                    )
            );
            ?>

            </div>
           
            
            </div>
         
            <div class="forms100c">
   <div class="forms50c">
                <label for="Medios">Medio</label><?php
                $this->widget('application.components.Relation', array(
                    'model' => $modelMeta,
                    'relation' => 'medio0',
                    'fields' => 'descripcion',
                    'allowEmpty' => false,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'class' => 'secuencias',)
                        )
                );
            ?>

            </div>
            
             
            
            
            
             <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'version'); ?>
                    <?php echo $form->textField($modelMeta, 'version', array('size' => 60, 'maxlength' => 64, 'style' => 'width:150px')); ?>
                    <?php echo $form->error($modelMeta, 'version'); ?>
                </div>
            </div>
            <div class="forms50c">
                <?php echo $form->labelEx($model, 'conservacionInicio'); ?>
                <?php
//Fecha inicial
                $today = date("Y-m-d H:i:s");
                if (isset($model->conservacionInicio))
                    $today = $model->conservacionInicio;
                else
                    $model->conservacionInicio = $today;
//fin Fecha inicial
                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'attribute' => 'conservacionInicio', //attribute name
                    'mode' => 'datetime', //use "time","date" or "datetime" (default)
                    'language' => 'es',
                    //    'value' =>$today,
                    'themeUrl' => '/themes',
                    'theme' => 'calendariocbm',
                    'htmlOptions'=>array('style'=>'width:140px;'),
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                        'showButtonPanel' => true,
                        "yearRange" => '1995:2070',
                        'changeYear' => true,
                        'buttonImage' => '/images/calendar.png',
                        'showOn' => "both",
                        'buttonText' => "Seleccione la fecha",
                        'buttonImageOnly' => true,
                    ) // jquery plugin options
                ));
                ?>
            </div>
            <div class="forms50c">
                 <?php echo $form->labelEx($model, 'conservacionFin'); ?>
                <?php
//Fecha inicial
                $today = date("Y-m-d H:i:s");
                if (isset($model->conservacionFin))
                    $today = $model->conservacionFin;
            //    else
                   // $model->conservacionFin = $today;
//fin Fecha inicial
                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'attribute' => 'conservacionFin', //attribute name
                    'mode' => 'datetime', //use "time","date" or "datetime" (default)
                    'language' => 'es',
                    //    'value' =>$today,
                    'themeUrl' => '/themes',
                    'theme' => 'calendariocbm',
                    'htmlOptions'=>array('style'=>'width:140px;'),
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                        'showButtonPanel' => true,
                        "yearRange" => '1995:2070',
                        'changeYear' => true,
                        'buttonImage' => '/images/calendar.png',
                        'showOn' => "both",
                        'buttonText' => "Seleccione la fecha",
                        'buttonImageOnly' => true,
                    ) // jquery plugin options
                ));
                ?>
            </div>
<div class="forms50c" style="vertical-align:middle;">
                
            </div>
            <div class="forms100c">
    <div class="forms50c">
                <label for="Secuencias">Secuencia</label><?php
                    $this->widget('application.components.Relation', array(
                        'model' => $model,
                        'relation' => 'secuencia0',
                        'fields' => 'descripcion',
                        'allowEmpty' => false,
                        'style' => 'dropdownlist',
                        'htmlOptions' => array(
                            'class' => 'secuenciaDoc',)
                            )
                    );
                    ?>

            </div>
            <div class="forms50c">
                <label for="OrdenSecuencias">Orden de secuencia</label><?php
                $this->widget('application.components.Relation', array(
                    'model' => $model,
                    'relation' => 'ordenSecuencia0',
                    'fields' => 'posicion',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'class' => 'secuenciaDoc',)
                        )
                );
                    ?>
            </div>
            <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'permitirAdiciones'); ?>
                    <?php echo $form->checkBox($model, 'permitirAdiciones'); ?>
                    <?php echo $form->error($model, 'permitirAdiciones'); ?>
                </div>
            </div>
            <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'permitirAnotaciones'); ?>
                    <?php echo $form->checkBox($model, 'permitirAnotaciones'); ?>
                    <?php echo $form->error($model, 'permitirAnotaciones'); ?>
                </div>
            </div>
            
            
        </div>
            <div class="forms100c">
                
            <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'autorizarOtros'); ?>
                    <?php echo $form->checkBox($model, 'autorizarOtros'); ?>
                    <?php echo $form->error($model, 'autorizarOtros'); ?>
                </div>
            </div>
            <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'requiereAutorizacion'); ?>
                    <?php echo $form->checkBox($model, 'requiereAutorizacion'); ?>
                    <?php echo $form->error($model, 'requiereAutorizacion'); ?>
                </div>
            </div>
            
            </div>

    </div>



<?php
    }
   
    if (0+$panel==2)
    {
     ?>
<p class="note">Campos con<span class="required">*</span> son necesarios.</p>



    <div class="forms100cb">
        <div class="forms100c">
            <div class="forms50c">
 <?php echo $form->labelEx($modelMeta, 'fechaCreacion'); ?>
                <?php
//Fecha inicial
                $today = date("Y-m-d H:i:s");
                if (isset($modelMeta->fechaCreacion))
                    $today = $modelMeta->fechaCreacion;
                else
                    $modelMeta->fechaCreacion= $today;
//fin Fecha inicial
                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker', array(
                    'model' => $modelMeta, //Model object
                    'attribute' => 'fechaCreacion', //attribute name
                    'mode' => 'datetime', //use "time","date" or "datetime" (default)
                    'language' => 'es',
                    //    'value' =>$today,
                    'themeUrl' => '/themes',
                    'theme' => 'calendariocbm',
                    'htmlOptions'=>array('style'=>'width:140px;'),
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                        'showButtonPanel' => true,
                        "yearRange" => '1995:2070',
                        'changeYear' => true,
                        'buttonImage' => '/images/calendar.png',
                        'showOn' => "both",
                        'buttonText' => "Seleccione la fecha",
                        'buttonImageOnly' => true,
                    ) // jquery plugin options
                ));
                ?>
            </div>
            <div class="forms50c">
                <label for="Usuarios">Documento subido por Usuario</label><?php
                    $this->widget('application.components.Relation', array(
                        'model' => $modelMeta,
                        'relation' => 'usuario0',
                        'fields' => 'Username',
                        'allowEmpty' => false,
                        'style' => 'dropdownlist',
                        'htmlOptions' => array(
                            'class' => 'secuencias',)
                            )
                    );
                    ?>
            </div>

            <div class="forms50c">
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'revisado'); ?>
                    <?php echo $form->checkBox($modelMeta, 'revisado'); ?>
                    <?php echo $form->error($modelMeta, 'revisado'); ?>
                </div>


            </div>

            <div class="forms50c">
                <?php echo $form->labelEx($modelMeta, 'fechaRevisado'); ?>
                <?php
//Fecha inicial
                $today = date("Y-m-d H:i:s");
                if (isset($modelMeta->fechaRevisado))
                    $today = $modelMeta->fechaRevisado;
             //   else
                 //   $modelMeta->fechaRevisado= $today;
//fin Fecha inicial
                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker', array(
                    'model' => $modelMeta, //Model object
                    'attribute' => 'fechaRevisado', //attribute name
                    'mode' => 'datetime', //use "time","date" or "datetime" (default)
                    'language' => 'es',
                    //    'value' =>$today,
                    'themeUrl' => '/themes',
                    'theme' => 'calendariocbm',
                    'htmlOptions'=>array('style'=>'width:140px;'),
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                        'showButtonPanel' => true,
                        "yearRange" => '1995:2070',
                        'changeYear' => true,
                        'buttonImage' => '/images/calendar.png',
                        'showOn' => "both",
                        'buttonText' => "Seleccione la fecha",
                        'buttonImageOnly' => true,
                    ) // jquery plugin options
                ));
                ?>
            </div>

            <div class="forms50c">
                <label for="Usuarios">Fué revisado por</label><?php
                    $this->widget('application.components.Relation', array(
                        'model' => $modelMeta,
                        'relation' => 'userRevisado0',
                        'fields' => 'Username',
                        'allowEmpty' => false,
                        'style' => 'dropdownlist',
                        'htmlOptions' => array(
                            'class' => 'secuencias',)
                            )
                    );
                    ?>
            </div>
        </div>
    </div>
<?php   
    }
?>

