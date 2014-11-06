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
                <?php echo $form->label($model,'Username'); ?>
                <?php echo $form->textField($model,'Username',array('size'=>60,'maxlength'=>128)); ?>
        </div>

        <div class="forms33c">
                <?php echo $form->label($model,'nombre'); ?>
                <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>128)); ?>
        </div>

        <div class="forms33c">
                <?php echo $form->label($model,'apellido'); ?>
                <?php echo $form->textField($model,'apellido',array('size'=>60,'maxlength'=>128)); ?>
        </div>

        <div class="forms33c">
                <?php echo $form->label($model,'ubicacionT'); ?>
                <?php ; ?>
        </div>

        <div class="forms33c">
                <?php echo $form->label($model,'esAdministrador'); ?>
                <?php echo $form->checkBox($model,'esAdministrador'); ?>
        </div>

        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Buscar')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
