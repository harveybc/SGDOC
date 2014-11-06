<?php
$this->breadcrumbs=array(
	'Préstamos'=>array('index'),
	$model->id,
);

$this->menu=array(
        array('label'=>'Devolución', 'url'=>array('update', 'id'=>$model->id)),	
        array('label'=>'Lista de Préstamos', 'url'=>array('index')),
	array('label'=>'Nuevo Préstamo', 'url'=>array('create')),
	array('label'=>'Borrar Préstamo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Está seguro/a de borrar esto?')),
	array('label'=>'Gestionar Préstamos', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle('Detalles de Préstamo #'.$model->id.''); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'cssFile'=>'/themes/detailview/styles.css',
	'attributes'=>array(
		'id',
		'metaDoc0.titulo',
		'cedula',
		'usuario0.Username',
		'usuarioRcv0.Username',
		'fechaPrestamo',
		'fechaDevolucion',
		'observaciones',
	),
)); ?>


