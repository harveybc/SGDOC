<p class="note">Campos con<span class="required">*</span> son necesarios.</p>

<?php echo $form->errorSummary($model); ?>

	<div class="forms33c">
			</div>

	<div class="forms33c">
			</div>


<label for="Documentos">Belonging Documentos</label><?php 
					$this->widget('application.components.Relation', array(
							'model' => $model,
							'relation' => 'documento0',
							'fields' => 'descripcion',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							)
						); ?>
			<label for="Competencias">Belonging Competencias</label><?php 
					$this->widget('application.components.Relation', array(
							'model' => $model,
							'relation' => 'competencia0',
							'fields' => 'descripcion',
							'allowEmpty' => true,
							'style' => 'dropdownlist',
							)
						); ?>
			