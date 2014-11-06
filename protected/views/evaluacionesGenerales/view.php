<?php
$this->breadcrumbs=array(
	'Evaluaciones Generales'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de EvaluacionesGenerales', 'url'=>array('index')),
	array('label'=>'Nueva Evaluación General', 'url'=>array('create')),
	array('label'=>'Actualizar Evaluación General', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Evaluación General', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Está seguro/a de borrar esto?')),
	array('label'=>'Gestionar Evaluaciones Generales', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle('Detalles de Evaluaciones Generales #'.$model->id.''); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
       'cssFile'=>'/themes/detailview/styles.css',
	'attributes'=>array(
		'id',
		'descripcion',
		'fechaInicio',
		'fechaFin',
		'pregunta1',
		'pregunta2',
		'pregunta3',
		'pregunta4',
		'pregunta5',
		'pregunta6',
		'pregunta7',
		'pregunta8',
		'pregunta9',
		'pregunta10',
	),
)); ?>


<br /><h2> Las siguientes evaluaciones pertenecen a evaluaciones generales: </h2>
<ul><?php foreach($model->evaluaciones as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->fecha, array('evaluaciones/view', 'id' => $foreignobj->id)));

				} ?></ul>