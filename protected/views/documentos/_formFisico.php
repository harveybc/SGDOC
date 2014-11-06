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


<?php echo $form->errorSummary(array($modelMeta)); ?>
<?php
$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels' => array(
        'Datos Básicos' => $this->renderPartial('_accordionFisico', array('form'=>$form ,'modelMeta' => $modelMeta, 'panel' => "0"), true),
        'Opciones Avanzadas' => $this->renderPartial('_accordionFisico', array('form'=>$form ,'modelMeta' => $modelMeta, 'panel' => "1"), true),
        'Datos de Creación y Revisión' => $this->renderPartial('_accordionFisico', array('form'=>$form ,'modelMeta' => $modelMeta, 'panel' => "2"), true),

    ),
    // additional javascript options for the accordion plugin
    'options' => array(
        'animated' => 'bounceslide',
    ),
    'htmlOptions' => array('style' => 'width:100%;margin:0px;padding:0px;text-align:center;                border:#AC8B3A 0px solid !important;
        box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.256875);
        -moz-box-shadow:2px 2px 2px rgba(0, 0, 0, 0.256875);
        -webkit-box-shadow:2px 2px 2px rgba(0, 0, 0, 0.256875);
        -moz-border-radius:8px;
        -webkit-border-radius: 8px;
        border-radius:8px;'),
    'themeUrl' => '/themes',
    'theme' => 'acordeonSgdoc',
   
));
?>
