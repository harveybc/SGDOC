<p class="note">Campos con<span class="required">*</span> son necesarios.</p>

<?php echo $form->errorSummary($model); ?>

	<div class="forms33c">
			</div>

	<div class="forms33c">
		<?php echo $form->labelEx($model,'posicion'); ?>
<?php echo $form->textField($model,'posicion'); ?>
<?php echo $form->error($model,'posicion'); ?>
	</div>


<label for="Secuencias">Belonging Secuencias</label><?php 
					$this->widget('application.components.Relation', array(
							'model' => $model,
							'relation' => 'secuencia0',
							'fields' => 'descripcion',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							)
						); ?>
			