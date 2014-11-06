<style>
    .forms100cb,.forms30c, input
    {
        text-align:left;
    }
    .secuencias
    {
        width:83%;
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
<p class="note">Campos con<span class="required">*</span> son necesarios.</p>

<?php echo $form->errorSummary($model); ?>

<div class="forms100cb">
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'titulo'); ?>
                    <?php echo $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 256)); ?>
                    <?php echo $form->error($model, 'titulo'); ?>
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
                'model' => $model,
            ));
                
    
    //echo CHtml::textField('query', isset($_GET['query']) ? $_GET['query'] : "", array("style"=>"width:300px;"));
    ?>
    
            </div>
            <div class="forms33c">
                <label for="Fabricantes">Fabricantes</label><?php
$this->widget('application.components.Relation', array(
    'model' => $model,
    'relation' => 'fabricante0',
    'fields' => 'descripcion',
    'allowEmpty' => false,
    'style' => 'dropdownlist', 'showAddButton' => 'Nuevo',
    'htmlOptions' => array(
        'class' => 'secuencias',)
        )
);
?>
            </div>

                <div class="forms100c" style="text-align:left;">
                    <?php echo $form->labelEx($model, 'descripcion'); ?>
                    <?php echo $form->textArea($model, 'descripcion', array('style' => 'width:95%;')); ?>
                    <?php echo $form->error($model, 'descripcion'); ?>
                </div>
            
    

                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'version'); ?>
                    <?php echo $form->textField($model, 'version', array('size' => 60, 'maxlength' => 64, 'styler' => 'width:100px')); ?>
                    <?php echo $form->error($model, 'version'); ?>
                </div>
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'disponibles'); ?>
                    <?php echo $form->textField($model, 'disponibles', array('styler' => 'width:60px')); ?>
                    <?php echo $form->error($model, 'disponibles'); ?>
                </div>
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'existencias'); ?>
                    <?php echo $form->textField($model, 'existencias', array('styler' => 'width:60px')); ?>
                    <?php echo $form->error($model, 'existencias'); ?>
                </div>
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'modulo'); ?>
                    <?php echo $form->textField($model, 'modulo', array('styler' => 'width:60px')); ?>
                    <?php echo $form->error($model, 'modulo'); ?>
                </div>
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'columna'); ?>
                    <?php echo $form->textField($model, 'columna', array('styler' => 'width:60px')); ?>
                    <?php echo $form->error($model, 'columna'); ?>
                </div>
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'fila'); ?>
                    <?php echo $form->textField($model, 'fila', array('styler' => 'width:60px')); ?>
                    <?php echo $form->error($model, 'fila'); ?>
                </div>
            <div class="forms33c">
                <?php echo $form->labelEx($model, 'fechaCreacion'); ?>
                <?php
//Fecha inicial
                $today = date("Y-m-d H:i:s");
                if (isset($model->fechaCreacion))
                    $today = $model->fechaCreacion;
             //   else
                  //  $model->fechaCreacion= $today;
//fin Fecha inicial
                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'attribute' => 'fechaCreacion', //attribute name
                    'mode' => 'datetime', //use "time","date" or "datetime" (default)
                    'language' => 'es',
                    //    'value' =>$today,
                    'themeUrl' => '/themes',
                    'theme' => 'calendarioCbm',
                    'htmlOptions'=>array('style'=>'width:85%;'),
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
              
                <?php echo $form->labelEx($model, 'fechaRecepcion'); ?>
                <?php
//Fecha inicial
                $today = date("Y-m-d H:i:s");
                if (isset($model->fechaRecepcion))
                    $today = $model->fechaRecepcion;
               else
                    $model->fechaCreacion= $today;
//fin Fecha inicial
                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'attribute' => 'fechaRecepcion', //attribute name
                    'mode' => 'datetime', //use "time","date" or "datetime" (default)
                    'language' => 'es',
                    //    'value' =>$today,
                    'themeUrl' => '/themes',
                    'theme' => 'calendarioCbm',
                    'htmlOptions'=>array('style'=>'width:85%;'),
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
                    <?php echo $form->labelEx($model, 'autores'); ?>
                    <?php echo $form->textField($model, 'autores', array('size' => 60, 'maxlength' => 256,'stylerr'=>'width:200px')); ?>
<?php echo $form->error($model, 'autores'); ?>
                </div>
            <div class="forms33c">
                <label for="TipoContenidos">Tipo de Contenido</label><?php
$this->widget('application.components.Relation', array(
    'model' => $model,
    'relation' => 'tipoContenido0',
    'fields' => 'descripcion',
    'allowEmpty' => false,
    'style' => 'dropdownlist', 
    'showAddButton' => 'Nuevo',
    'htmlOptions' => array(
        'class' => 'secuencias',)
        )
);
?>

            </div>

            <div class="forms33c">
                <label for="Cervecerias">Cervecerias </label><?php
$this->widget('application.components.Relation', array(
    'model' => $model,
    'relation' => 'cerveceria0',
    'fields' => 'descripcion',
    'allowEmpty' => true,
    'style' => 'dropdownlist', 'showAddButton' => 'Nuevo',
    'htmlOptions' => array(
        'class' => 'secuencias',)
        )
);
?>

            </div>
    <div class="forms33c">
                    <?php echo $form->labelEx($model, 'numPedido'); ?>
                    <?php echo $form->textField($model, 'numPedido', array('size' => 60, 'maxlength' => 64, 'styler' => 'width:100px')); ?>
                    <?php echo $form->error($model, 'numPedido'); ?>
                </div>
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'numComision'); ?>
                    <?php echo $form->textField($model, 'numComision', array('size' => 60, 'maxlength' => 64, 'styler' => 'width:100px')); ?>
                    <?php echo $form->error($model, 'numComision'); ?>
                </div>                

            <div class="forms33c">
                <label for="Medios">Medio</label><?php
$this->widget('application.components.Relation', array(
    'model' => $model,
    'relation' => 'medio0',
    'fields' => 'descripcion',
    'allowEmpty' => false,
    'style' => 'dropdownlist', 'showAddButton' => 'Nuevo',
    'htmlOptions' => array(
        'class' => 'secuencias',)
        )
);
?>

            </div>
            <div class="forms33c">
                <label for="Idiomas">Idioma</label><?php
$this->widget('application.components.Relation', array(
    'model' => $model,
    'relation' => 'idioma0',
    'fields' => 'descripcion',
    'allowEmpty' => false,
    'style' => 'dropdownlist', 'showAddButton' => 'Nuevo',
    'htmlOptions' => array(
        'class' => 'secuencias',)
        )
);
?>
            </div>
            <div class="forms33c">
                <label for="Documentos">Unidad documental</label><?php
$this->widget('application.components.Relation', array(
    'model' => $model,
    'relation' => 'documento0',
    'fields' => 'descripcion',
    'allowEmpty' => false,
    'style' => 'dropdownlist', 'showAddButton' => 'Nuevo',
    'htmlOptions' => array(
        'class' => 'secuencias',)
        )
);
?>

            </div>
            <div class="forms33c">
                <label for="Usuarios">Registrado por</label><?php
$this->widget('application.components.Relation', array(
    'model' => $model,
    'relation' => 'usuario0',
    'fields' => 'Analista',
    'allowEmpty' => false,
    'style' => 'dropdownlist', 'showAddButton' => 'Nuevo',
    'htmlOptions' => array(
        'class' => 'secuencias',)
        )
);
?>
            </div>

            <div class="forms33c">
                <label for="Usuarios">Fué revisado por</label><?php
$this->widget('application.components.Relation', array(
    'model' => $model,
    'relation' => 'userRevisado0',
    'fields' => 'Analista',
    'allowEmpty' => false,
    'style' => 'dropdownlist', 'showAddButton' => 'Nuevo',
    'htmlOptions' => array(
        'class' => 'secuencias',)
        )
);
?>

            </div>
            <div class="forms33c">
                <label for="Secuencias">Pertenece a la siguiente secuencia</label><?php
$this->widget('application.components.Relation', array(
    'model' => $model,
    'relation' => 'secuencia0',
    'fields' => 'descripcion',
    'allowEmpty' => false,
    'style' => 'dropdownlist', 'showAddButton' => 'Nuevo',
    'htmlOptions' => array(
        'class' => 'secuencias',)
        )
);
?>
            </div>



            <div class="forms33c">
                <label for="OrdenSecuencias">Orden dentro de secuencia</label><?php
$this->widget('application.components.Relation', array(
    'model' => $model,
    'relation' => 'ordenSecuencia0',
    'fields' => 'posicion',
    'allowEmpty' => true,
    'style' => 'dropdownlist', 'showAddButton' => 'Nuevo',
    'htmlOptions' => array(
        'class' => 'secuencias',)
        )
);
?>
            </div>
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'ISBN'); ?>
                    <?php echo $form->textField($model, 'ISBN', array('size' => 32, 'maxlength' => 32, 'styler' => 'width:100px')); ?>
<?php echo $form->error($model, 'ISBN'); ?>
                </div>
                <div class="forms33c">
                    <?php echo $form->labelEx($model, 'EAN13'); ?>
                    <?php echo $form->textField($model, 'EAN13', array('size' => 32, 'maxlength' => 32, 'styler' => 'width:100px')); ?>
<?php echo $form->error($model, 'EAN13'); ?>
                </div>
    <div class="forms33c">
                    <?php echo $form->labelEx($model, 'fechaRevisado'); ?>
                    <?php echo $form->textField($model, 'fechaRevisado'); ?>
<?php echo $form->error($model, 'fechaRevisado'); ?>
                </div>
                    <div class="forms33c">
                    <?php echo $form->labelEx($model, 'revisado'); ?>
                    <?php echo $form->checkBox($model, 'revisado',array('style'=>'width:auto;')); ?>
<?php echo $form->error($model, 'revisado'); ?>
                </div>
</div>






































