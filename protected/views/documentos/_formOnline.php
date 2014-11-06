
<script>
    function cambiarTitulo(){
        
        var conv=$('#Documentos_descripcion').attr('value');
        $('#MetaDocs_titulo').attr('value',conv);
    }
</script>
    <?php
    Yii::app()->clientScript->registerScript('highlightAC', '$.ui.autocomplete.prototype._renderItem = function (ul, item) {
  item.label = item.label.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + $.ui.autocomplete.escapeRegex(this.term) + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<strong>$1</strong>");
  return $("<li></li>")
  .data("item.autocomplete", item)
  .append("<a>" + item.label + "</a>")
  .appendTo(ul);
  };', CClientScript::POS_END);
    ?>
 <?php echo $form->errorSummary(array($modelMeta, $modelA)); ?>
<br/>
<div class="forms100cb" class="marcoDoc1">
    <legend style="color:#961C1F"><b>Datos Básicos</b></legend>
                <div class="forms50c">
                    <?php echo $form->labelEx($modelMeta, 'titulo'); ?>
                    <?php echo $form->textField($modelMeta, 'titulo', array('size' => 60, 'maxlength' => 128, 'style' => 'width:300px')); ?>
                    <?php echo $form->error($modelMeta, 'titulo'); ?>
                </div>
                         <div class="forms50c">
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

</div>


<?php
 //echo $form->textField($modelA,'contenido');

$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels' => array(
        'Contenido' => $this->renderPartial('_accordionV', array('form'=>$form ,'modelA' => $modelA, 'panel' => "0"), true),
        'Metadatos' => $this->renderPartial('_accordionV', array('form'=>$form ,'modelA' => $modelA,'modelMeta' => $modelMeta, 'panel' => "1"), true),
        
    ),
    // additional javascript options for the accordion plugin
    'options' => array(
        'animated' => 'bounceslide',
    ),
    'htmlOptions' => array('class' => 'forms100c'),
    'themeUrl' => '/themes',
    'theme' => 'acordeonSgdoc',
   
));
?>

