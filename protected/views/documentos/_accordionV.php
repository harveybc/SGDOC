<div class="forms100c">
<?php
if (0 + $panel == 0) {
    $this->widget('application.extensions.editor.CKkceditor', array(
        "model" => $modelA, # Data-Model
        "attribute" => 'contenido', # Attribute in the Data-Model
        "height" => '155px',
        "width" => '100%',
        "filespath" => (!$modelA->isNewRecord) ? Yii::app()->basePath . "/../uploads/" . $modelA->documento . "/" : "",
        "filesurl" => (!$modelA->isNewRecord) ? Yii::app()->baseUrl . "/uploads/" . $modelA->documento . "/" : "",
    ));
}
?>
</div>
    <?php

if (0 + $panel == 1) {
    ?>
    <script>
        function cambiarTitulo(){
                
            var conv=$('#Documentos_descripcion').attr('value');
            $('#MetaDocs_titulo').attr('value',conv);
        }
    </script>


    <p class="note">Campos con<span class="required">*</span> son obligatorios.</p>
    <div class="forms100c" style="text-align:left;">
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'descripcion'); ?>
                    <?php echo $form->textArea($modelMeta, 'descripcion', array('size' => 60, 'maxlength' => 256, 'style' => 'width:150px')); ?>
                    <?php echo $form->error($modelMeta, 'descripcion'); ?>
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
                    'htmlOptions' => array('style' => 'width:140px;'),
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
                    <?php echo $form->labelEx($modelMeta, 'ISBN'); ?>
                    <?php echo $form->textField($modelMeta, 'ISBN', array('size' => 32, 'maxlength' => 32, 'style' => 'width:150px')); ?>
                    <?php echo $form->error($modelMeta, 'ISBN'); ?>
                </div>
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'autores'); ?>
                    <?php echo $form->textField($modelMeta, 'autores', array('size' => 60, 'maxlength' => 256, 'style' => 'width:150px')); ?>
                    <?php echo $form->error($modelMeta, 'autores'); ?>
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
                <label for="Cervecerias">Cerveceria</label><?php
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
                    <?php echo $form->labelEx($modelMeta, 'numPedido'); ?>
                    <?php echo $form->textField($modelMeta, 'numPedido', array('size' => 60, 'maxlength' => 64, 'style' => 'width:150px')); ?>
                    <?php echo $form->error($modelMeta, 'numPedido'); ?>
                </div>
                <div class="forms33c">
                    <?php echo $form->labelEx($modelMeta, 'numComision'); ?>
                    <?php echo $form->textField($modelMeta, 'numComision', array('size' => 60, 'maxlength' => 64, 'style' => 'width:150px')); ?>
                    <?php echo $form->error($modelMeta, 'numComision'); ?>
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
                    <?php echo $form->labelEx($modelMeta, 'version'); ?>
                    <?php echo $form->textField($modelMeta, 'version', array('size' => 60, 'maxlength' => 64, 'style' => 'width:150px')); ?>
                    <?php echo $form->error($modelMeta, 'version'); ?>
                </div>
            <div class="forms33c">
                <label for="Secuencias">Pertenece a secuencia</label><?php
                    $this->widget('application.components.Relation', array(
                        'model' => $modelMeta,
                        'relation' => 'secuencia0',
                        'fields' => 'descripcion',
                        'allowEmpty' => false,
                        'style' => 'dropdownlist',
                        'htmlOptions' => array(
                            'class' => 'secuenciaDoc1',)
                            )
                    );
                    ?>

            </div>
            <div class="forms33c">
                <label for="OrdenSecuencias">Orden dentro de secuencia</label><?php
                $this->widget('application.components.Relation', array(
                    'model' => $modelMeta,
                    'relation' => 'ordenSecuencia0',
                    'fields' => 'posicion',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'class' => 'secuenciaDoc1',)
                        )
                );
                    ?>
            </div>
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
                    'htmlOptions' => array('style' => 'width:140px;'),
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
                    'htmlOptions' => array('style' => 'width:140px;'),
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
                    <?php echo $form->labelEx($modelMeta, 'revisado'); ?>
                    <?php echo $form->checkBox($modelMeta, 'revisado'); ?>
                    <?php echo $form->error($modelMeta, 'revisado'); ?>
            </div>
    </div>

    <?php
}
?>

