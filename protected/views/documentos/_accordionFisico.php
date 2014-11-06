

<script>
    function cambiarTitulo(){
        
        var conv=$('#Documentos_descripcion').attr('value');
        $('#MetaDocs_titulo').attr('value',conv);
    }
</script>


<br/>

<?php
if (0 + $panel == 0) {
    ?>



        <div class="forms100c">
            <div class="forms33c">          
                <div class="row">
                    <?php echo $form->labelEx($modelMeta, 'titulo'); ?>
                    <?php echo $form->textField($modelMeta, 'titulo', array('size' => 60, 'maxlength' => 128, 'style' => 'wildth:250px')); ?>
                    <?php echo $form->error($modelMeta, 'titulo'); ?>
                </div>
            </div>
            <div class="forms33c">
                <label for="UbicacionTec">Ubicación Técnica</label>
                
    <?php
// Si existe el parámetro $_GET[OT]
// lee valores de get desde
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'attribute' => 'ubicacionT_str',
                'source' => CController::createUrl('u_tecnicas/ut_search'),
                'options' => array(
                    'minLength' => '1',
                    'select' => 'js:function(event, ui) { console.log(ui.item.id +":"+ui.item.value); }',
                ),
                'htmlOptions' => array(
                    'style' => 'width:100%; text-align:left;'
                ),
                'model' => $modelMeta,
            ));
                
    
    //echo CHtml::textField('query', isset($_GET['query']) ? $_GET['query'] : "", array("style"=>"width:300px;"));
    ?>
    
            </div>

            <div class="forms33c">
                <div class="row">
                    <?php echo $form->labelEx($modelMeta, 'autores'); ?>
                    <?php echo $form->textField($modelMeta, 'autores', array('size' => 60, 'maxlength' => 256, 'style' => 'wildth:250px')); ?>
                    <?php echo $form->error($modelMeta, 'autores'); ?>
                </div>

            </div>
            <div class="forms33c">
                <div class="row">
                    <?php echo $form->labelEx($modelMeta, 'modulo'); ?>
                    <?php echo $form->textField($modelMeta, 'modulo', array('style' => 'wildth:20px;')); ?>
                    <?php echo $form->error($modelMeta, 'modulo'); ?>
                </div>
            </div>
            <div class="forms33c">

                <div class="row">
                    <?php echo $form->labelEx($modelMeta, 'columna'); ?>
                    <?php echo $form->textField($modelMeta, 'columna', array('style' => 'wildth:20px')); ?>
                    <?php echo $form->error($modelMeta, 'columna'); ?>
                </div>


            </div>
            <div class="forms33c" styler="padding-right:30px">
                <div class="row">
                    <?php echo $form->labelEx($modelMeta, 'fila'); ?>
                    <?php echo $form->textField($modelMeta, 'fila', array('style' => 'wildth:20px')); ?>
                    <?php echo $form->error($modelMeta, 'fila'); ?>
                </div>
            </div>


            <div class="forms33c">
                <div class="row">
                    <?php echo $form->labelEx($modelMeta, 'disponibles'); ?>
                    <?php echo $form->textField($modelMeta, 'disponibles', array('style' => 'wildth:100px')); ?>
                    <?php echo $form->error($modelMeta, 'disponibles'); ?>
                </div>
            </div>

            <div class="forms33c">
                <div class="row">
                    <?php echo $form->labelEx($modelMeta, 'existencias'); ?>
                    <?php echo $form->textField($modelMeta, 'existencias', array('style' => 'wildth:100px')); ?>
                    <?php echo $form->error($modelMeta, 'existencias'); ?>
                </div>
            </div>

            <div class="forms33c">
                <div class="row">
                    <?php echo $form->labelEx($modelMeta, 'ISBN'); ?>
                    <?php echo $form->textField($modelMeta, 'ISBN', array('size' => 32, 'maxlength' => 32)); ?>
                    <?php echo $form->error($modelMeta, 'ISBN'); ?>
                </div>
            </div>
            <div class="forms33c">
                <div class="row">
                    <?php echo $form->labelEx($modelMeta, 'EAN13'); ?>
                    <?php echo $form->textField($modelMeta, 'EAN13', array('size' => 32, 'maxlength' => 32, )); ?>
                    <?php echo $form->error($modelMeta, 'EAN13'); ?>
                </div>
            </div>

        </div>

    <?php
}

if (0 + $panel == 1) {
    ?>

        <div class="forms100c">
            <div class="forms33c">
                <div class="row">
    <?php echo $form->labelEx($modelMeta, 'descripcion'); ?>
                    <?php echo $form->textArea($modelMeta, 'descripcion', array('size' => 60, 'maxlength' => 256, 'style' => 'wildth:150px')); ?>
                    <?php echo $form->error($modelMeta, 'descripcion'); ?>
                </div>
            </div>
            <div class="forms33c">
                <div class="row">
    <?php echo $form->labelEx($modelMeta, 'numPedido'); ?>
                    <?php echo $form->textField($modelMeta, 'numPedido', array('size' => 60, 'maxlength' => 64, 'style' => 'wildth:150px')); ?>
                    <?php echo $form->error($modelMeta, 'numPedido'); ?>
                </div>
            </div>
            <div class="forms33c">
                <div class="row">
    <?php echo $form->labelEx($modelMeta, 'numComision'); ?>
                    <?php echo $form->textField($modelMeta, 'numComision', array('size' => 60, 'maxlength' => 64, 'style' => 'wildth:150px')); ?>
                    <?php echo $form->error($modelMeta, 'numComision'); ?>
                </div>                
            </div>
            <div class="forms33c">
    <?php echo $form->labelEx($modelMeta, 'fechaRecepcion'); ?>
                <?php
//Fecha inicial
                $today = date("Y-m-d H:i:s");
                if (isset($modelMeta->fechaRecepcion))
                    $today = $modelMeta->fechaRecepcion;
                else
                    $modelMeta->fechaRecepcion = $today;
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
                    'htmlOptions' => array('style' => 'wildth:140px;'),
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

         <div class="forms33c">
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


            <div class="forms33c">
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
            <div class="forms33c">
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




            <div class="forms33c">
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


        

        
            <div class="forms33c">
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





            <div class="forms33c">
                <div class="row">
    <?php echo $form->labelEx($modelMeta, 'version'); ?>
                    <?php echo $form->textField($modelMeta, 'version', array('size' => 60, 'maxlength' => 64, 'style' => 'wildth:150px')); ?>
                    <?php echo $form->error($modelMeta, 'version'); ?>
                </div>
            </div>




            <div class="forms33c">
                <label for="Secuencias">Secuencia</label><?php
                $this->widget('application.components.Relation', array(
                    'model' => $modelMeta,
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
            <div class="forms33c">
                <label for="OrdenSecuencias">Orden de secuencia</label><?php
            $this->widget('application.components.Relation', array(
                'model' => $modelMeta,
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



</div>



    <?php
}

if (0 + $panel == 2) {
    ?>
    <p class="note">Campos con<span class="required">*</span> son necesarios.</p>
        <div class="forms100c">
            <div class="forms33c">
    <?php echo $form->labelEx($modelMeta, 'fechaCreacion'); ?>
    <?php
//Fecha inicial
    $today = date("Y-m-d H:i:s");
    if (isset($modelMeta->fechaCreacion))
        $today = $modelMeta->fechaCreacion;
    else
        $modelMeta->fechaCreacion = $today;
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
        'htmlOptions' => array('style' => 'wildth:140px;'),
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
            <div class="forms33c">
                <label for="Usuarios">Documento subido por Usuario</label><?php
            $this->widget('application.components.Relation', array(
                'model' => $modelMeta,
                'relation' => 'usuario0',
                'fields' => 'Analista',
                'allowEmpty' => false,
                'style' => 'dropdownlist',
                'htmlOptions' => array(
                    'class' => 'secuencias',)
                    )
            );
    ?>
            </div>

            

            <div class="forms33c">
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
        'htmlOptions' => array('style' => 'wildth:140px;'),
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

            <div class="forms33c">
                <label for="Usuarios">Fué revisado por</label><?php
            $this->widget('application.components.Relation', array(
                'model' => $modelMeta,
                'relation' => 'userRevisado0',
                'fields' => 'Analista',
                'allowEmpty' => false,
                'style' => 'dropdownlist',
                'htmlOptions' => array(
                    'class' => 'secuencias',)
                    )
            );
    ?>
            </div>
            <div class="forms33c" style="text-align:left;">
                <div class="row" >
    <?php echo $form->labelEx($modelMeta, 'revisado'); ?>
    <?php echo $form->checkBox($modelMeta, 'revisado'); ?>
                    <?php echo $form->error($modelMeta, 'revisado'); ?>
                </div>


            </div>
        </div>
    
    <?php
}
?>

