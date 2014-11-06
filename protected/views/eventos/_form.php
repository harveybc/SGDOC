<p class="note">Campos con<span class="required">*</span> son necesarios.</p>

<?php echo $form->errorSummary($model); ?>

	<div class="forms33c">
			</div>

	<div class="forms33c">
			</div>

	<div class="forms33c">
			</div>


<label for="Usuarios">Belonging Usuarios</label><?php 
					$this->widget('application.components.Relation', array(
							'model' => $model,
							'relation' => 'usuario0',
							'fields' => 'Username',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							)
						); ?>
			<label for="Modulos">Belonging Modulos</label><?php 
					$this->widget('application.components.Relation', array(
							'model' => $model,
							'relation' => 'modulo0',
							'fields' => 'descripcion',
							'allowEmpty' => true,
							'style' => 'dropdownlist',
							)
						); ?>
			<label for="Operaciones">Belonging Operaciones</label><?php 
					$this->widget('application.components.Relation', array(
							'model' => $model,
							'relation' => 'operacion0',
							'fields' => 'descripcion',
							'allowEmpty' => true,
							'style' => 'dropdownlist',
							)
						); ?>
			