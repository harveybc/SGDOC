

<script>
    function cambiarTitulo(){
        
        var conv=$('#Documentos_descripcion').attr('value');
        $('#MetaDocs_titulo').attr('value',conv);
    }
</script>


<p class="note">Campos con<span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary(array($modelMeta,$modelArchivo)); ?>

<?php
$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels' => array(
        'Datos Básicos' => $this->renderPartial('_accordionSubir', array('form' => $form, 'modelMeta' => $modelMeta, 'modelArchivo' => $modelArchivo, 'panel' => "0"), true),
        'Opciones Avanzadas' => $this->renderPartial('_accordionSubir', array('form' => $form, 'modelMeta' => $modelMeta, 'panel' => "1"), true),
        'Datos de Creación y Revisión' => $this->renderPartial('_accordionSubir', array('form' => $form, 'modelMeta' => $modelMeta, 'panel' => "2"), true),
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
