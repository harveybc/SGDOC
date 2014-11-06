<?php
$this->breadcrumbs=array(
	'Secuencias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de Secuencias', 'url'=>array('index')),
	array('label'=>'Nueva Secuencia', 'url'=>array('create')),
	array('label'=>'Actualizar Secuencia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Secuencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Está seguro/a de borrar esto?')),
	array('label'=>'Gestionar Secuencias', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle('Detalles de Secuencias #'.$model->id.''); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
       'cssFile'=>'/themes/detailview/styles.css',
	'attributes'=>array(
		'id',
		'descripcion',
	),
)); ?>


<br /><h2> This Documentos belongs to this Secuencias: </h2>
<ul><?php foreach($model->documentoses as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->descripcion, array('documentos/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> Estos documentos son de este  Secuencias: </h2>
<ul><?php foreach($model->metaDocs as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->numPedido, array('metadocs/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> This OrdenSecuencias belongs to this Secuencias: </h2>
<ul><?php foreach($model->ordenSecuenciases as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->posicion, array('ordensecuencias/view', 'id' => $foreignobj->id)));

				} ?></ul>