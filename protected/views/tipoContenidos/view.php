<?php
$this->breadcrumbs=array(
	'Tipo de Contenidos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de Tipo Contenidos', 'url'=>array('index')),
	array('label'=>'Nuevo Tipo Contenido', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo Contenido', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Tipo Contenido', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Está seguro/a de borrar esto??')),
	array('label'=>'Gestionar Tipo Contenidos', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle('Detalles de Tipo de Contenidos #'.$model->id.''); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
       'cssFile'=>'/themes/detailview/styles.css',
	'attributes'=>array(
		'id',
		'descripcion',
	),
)); ?>


<br /><h2> Estos documentos son de este  TipoContenidos: </h2>
<ul><?php foreach($model->metaDocs as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->numPedido, array('metadocs/view', 'id' => $foreignobj->id)));

				} ?></ul>