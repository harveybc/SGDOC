<style type="text/css">



    .secuencias{

        width: 205px;


    }

</style>


<p class="note">Campos con<span class="required">*</span> son necesarios.</p>

<?php echo $form->errorSummary($model); ?>

<div class="forms100cb">
    <div class="forms33c">
        <div>
            <?php echo $form->labelEx($model, 'cedula'); ?>
            <?php echo $form->textField($model, 'cedula', array('size' => 32, 'class'=>'secuencias','maxlength' => 32)); ?>
            <?php echo $form->error($model, 'cedula'); ?>
        </div>
    </div>
    <div class="forms33c">
        <div class="forms33c">
            <?php echo $form->labelEx($model, 'fechaPrestamo'); ?>

            <?php
//Fecha inicial
            $today = date("Y-m-d H:i:s");
            if (isset($model->fechaPrestamo))
                $today = $model->fechaPrestamo;
            else 
                $model->fechaPrestamo=$today;
            //   else
            //  $model->fechaCreacion= $today;
//fin Fecha inicial
            Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker', array(
                'model' => $model, //Model object
                'attribute' => 'fechaPrestamo', //attribute name
                'mode' => 'datetime', //use "time","date" or "datetime" (default)
                'language' => 'es',
                //    'value' =>$today,
                'themeUrl' => '/themes',
                'theme' => 'calendarioCbm',
                'htmlOptions' => array('style' => 'width:130px;'),
                
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


            <?php echo $form->error($model, 'fechaPrestamo'); ?>
        </div>
    </div>
    <div class="forms33c">

            <?php echo $form->labelEx($model, 'fechaDevolucion'); ?>


            <?php
//Fecha inicial
            $today = date("Y-m-d H:i:s");
            if (isset($model->fechaDevolucion))
                $today = $model->fechaDevolucion;
            //   else
            //  $model->fechaCreacion= $today;
//fin Fecha inicial
            Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker', array(
                'model' => $model, //Model object
                'attribute' => 'fechaDevolucion', //attribute name
                'mode' => 'datetime', //use "time","date" or "datetime" (default)
                'language' => 'es',
                //    'value' =>$today,
                'themeUrl' => '/themes',
                'theme' => 'calendarioCbm',
                'htmlOptions' => array('style' => 'width:130px;'),
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


            <?php echo $form->error($model, 'fechaDevolucion'); ?>
        </div>
        
        <div class="forms33c">
            <label for="MetaDocs">Documento prestado</label><?php
            $this->widget('application.components.Relation', array(
                'model' => $model,
                'relation' => 'metaDoc0',
                'fields' => 'titulo',
                'allowEmpty' => true,
                'style' => 'dropdownlist',
                'htmlOptions' => array(
                    'class' => 'secuencias',)
                    )
            );
            ?>
            <input id="lector" class="secuencias" value="Entrada para lector de Barcodes."/>
            
        </div>
        <div class="forms33c">
            <label for="Usuarios">Usuario que solicita el préstamo</label><?php
            $this->widget('application.components.Relation', array(
                'model' => $model,
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
            <label for="Usuarios">Usuario responsable</label><?php
            $this->widget('application.components.Relation', array(
                'model' => $model,
                'relation' => 'usuarioRcv0',
                'fields' => 'Analista',
                'allowEmpty' => false,
                'style' => 'dropdownlist',
                'htmlOptions' => array(
                    'class' => 'secuencias',)
                    )
            );
            ?>
        </div>




        <div class="forms100c" >
            <div class="forms100c">
                <?php echo $form->labelEx($model, 'observaciones'); ?>
                <?php echo $form->textArea($model, 'observaciones', array('size' => 60, 'maxlength' => 512,'style'=>'width:98%;')); ?>
                <?php echo $form->error($model, 'observaciones'); ?>
            </div>
        </div>
    </div>







