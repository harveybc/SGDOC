<?php
$this->breadcrumbs=array(
	'Eventos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de Eventos', 'url'=>array('index')),
	array('label'=>'Nuevo Evento', 'url'=>array('create')),
	array('label'=>'Actualizar Evento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Evento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Eventos', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle('Detalles de Evento #'.$model->id.''); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'usuario0.Username',
		'modulo0.descripcion',
		'operacion0.descripcion',
	),
)); ?>


