<style type="text/css">



    .secuencias{

        width: 200px;
        
        
    }



</style>

<p class="note">Campos con<span class="required">*</span> son necesarios.</p>

<?php echo $form->errorSummary($model); ?>

<div class="forms100c" style="width:470px !important;height:200px;margin-left:0px;margin-bottom:5px !important;border-color:#961C1F;padding-top:10px;padding-right:5px;padding-left:14px; ">

<div class="forms100cb">
    <div class="forms100c">
        <div class="forms50c">
            <div class="forms33c">
		<?php echo $form->labelEx($model,'Username'); ?>
<?php echo $form->textField($model,'Username',array('size'=>60,'maxlength'=>128,'style' => 'width:200px')); ?>
<?php echo $form->error($model,'Username'); ?>
	</div>
            </div>
             <div class="forms50c">
                 <div class="forms33c">
		<?php echo $form->labelEx($model,'password'); ?>
<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128,'style' => 'width:200px')); ?>
<?php echo $form->error($model,'password'); ?>
	</div>
            </div>
        </div>
        <div class="forms100c">
        <div class="forms50c">
            <div class="forms33c">
		<?php echo $form->labelEx($model,'nombre'); ?>
<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>128,'style' => 'width:200px')); ?>
<?php echo $form->error($model,'nombre'); ?>
	</div>
            </div>
             <div class="forms50c">
                 <div class="forms33c">
		<?php echo $form->labelEx($model,'apellido'); ?>
<?php echo $form->textField($model,'apellido',array('size'=>60,'maxlength'=>128,'style' => 'width:200px')); ?>
<?php echo $form->error($model,'apellido'); ?>
	</div>
            </div>
            </div>
            <div class="forms100c">
                
            <div class="forms50c">
                <div class="forms33c">
			</div>

	<div class="forms33c">
		<?php echo $form->labelEx($model,'esAdministrador'); ?>
<?php echo $form->checkBox($model,'esAdministrador'); ?>
<?php echo $form->error($model,'esAdministrador'); ?>
	</div>
                </div>
                <div class="forms50c">
                <label for="UbicacionTec">Pertenece a la siguiente Ubicación Técnica</label><?php 
					$this->widget('application.components.Relation', array(
							'model' => $model,
							'relation' => 'ubicacionT0',
							'fields' => 'codigoSAP',
							'allowEmpty' => true,
							'style' => 'dropdownlist',
                                                        'htmlOptions' => array(
                                                                'class' => 'secuencias',)
                                            
							)
						); ?>
                </div>
        </div>
    
    </div>
	
</div>
	

	

	

	



			