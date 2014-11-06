<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Username')); ?>:</b>
	<?php echo CHtml::encode($data->Username); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido')); ?>:</b>
	<?php echo CHtml::encode($data->apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ubicacionT')); ?>:</b>
	<?php echo CHtml::encode($data->ubicacionT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esAdministrador')); ?>:</b>
	<?php echo CHtml::encode($data->esAdministrador); ?>
	<br />

<!-- echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	echo CHtml::encode($data->password); ?>
	<br />  -
</div>
-->