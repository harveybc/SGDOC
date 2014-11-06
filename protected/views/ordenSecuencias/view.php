<?php
$this->breadcrumbs=array(
	'Orden Secuenciases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de OrdenSecuencias', 'url'=>array('index')),
	array('label'=>'Create OrdenSecuencias', 'url'=>array('create')),
	array('label'=>'Update OrdenSecuencias', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrdenSecuencias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdenSecuencias', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle('View OrdenSecuencias #'.$model->id.''); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'secuencia0.descripcion',
		'posicion',
	),
)); ?>


<br /><h2> This Documentos belongs to this OrdenSecuencias: </h2>
<ul><?php foreach($model->documentoses as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->descripcion, array('documentos/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> Estos documentos son de este  OrdenSecuencias: </h2>
<ul><?php foreach($model->metaDocs as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->numPedido, array('metadocs/view', 'id' => $foreignobj->id)));

				} ?></ul>