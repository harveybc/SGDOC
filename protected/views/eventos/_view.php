<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modulo')); ?>:</b>
	<?php echo CHtml::encode($data->modulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operacion')); ?>:</b>
	<?php echo CHtml::encode($data->operacion); ?>
	<br />


</div>
