<p class="note">Campos con<span class="required">*</span> son necesarios.</p>

<?php echo $form->errorSummary($model); ?>

	<div class="forms33c">
		<?php echo $form->labelEx($model,'indice'); ?>
<?php echo $form->textField($model,'indice',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'indice'); ?>
	</div>

	<div class="forms33c">
		<?php echo $form->labelEx($model,'descripcion'); ?>
<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="forms33c">
			</div>


<label for="MetaDocs">Documento</label><?php 
					$this->widget('application.components.Relation', array(
							'model' => $model,
							'relation' => 'metaDoc0',
							'fields' => 'titulo',
							'allowEmpty' => true,
							'style' => 'dropdownlist',
                                                        'htmlOptions'=>array('style'=>'width:200px;'),
							)
						); ?>
			