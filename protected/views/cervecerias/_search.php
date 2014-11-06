<div class="forms100cb">

<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

        

        <div class="forms33c">
                <?php echo $form->label($model,'descripcion'); ?>
                <?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>128)); ?>
        </div>

        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Buscar')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
