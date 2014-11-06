<div class="forms100cb">

<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

        <div class="forms33c">
                <?php echo $form->label($model,'id'); ?>
                <?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
        </div>

        <div class="forms33c">
                <?php echo $form->label($model,'codigoSAP'); ?>
                <?php echo $form->textField($model,'codigoSAP',array('size'=>60,'maxlength'=>64)); ?>
        </div>

        <div class="forms33c">
                <?php echo $form->label($model,'descripcion'); ?>
                <?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>128)); ?>
        </div>

        <div class="forms33c">
                <?php echo $form->label($model,'padre'); ?>
                <?php ; ?>
        </div>

        <div class="forms33c">
                <?php echo $form->label($model,'supervisor'); ?>
                <?php ; ?>
        </div>

        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Buscar')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
