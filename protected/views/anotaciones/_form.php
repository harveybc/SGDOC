
<style type="text/css">



    .secuencias{

        width: 290px;
        
    }
</style>
<?php $this->layout="column1";?>
<p class="note">Campos con<span class="required">*</span> son necesarios.</p>

<?php echo $form->errorSummary($model); ?>


<div class="forms100c" style="margin-left:0px;margin-bottom:5px !important;border-color:#961C1F;padding-top:17px;padding-right:5px;padding-left:14px; ">

<div class="forms100cb">
    <div class="forms100c">
        <div class="forms50c">
<?php
            $this->widget('application.extensions.editor.CKkceditor', array(
        "model" => $model, # Data-Model
        "attribute" => 'contenido', # Attribute in the Data-Model
        "height" => '155px',
        "width" => '100%',
        "filespath" => (!$model->isNewRecord) ? Yii::app()->basePath . "/../uploads/" . $model->documento . "/" : "",
        "filesurl" => (!$model->isNewRecord) ? Yii::app()->baseUrl . "/uploads/" . $model->documento . "/" : "",
    ));
?>
        </div>
    </div>

</div>

</div>







