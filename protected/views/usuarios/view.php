<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de Usuarios', 'url'=>array('index')),
	array('label'=>'Nuevo Usuario', 'url'=>array('create')),
	array('label'=>'Actualizar Usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Está seguro/a de borrar esto?')),
	array('label'=>'Gestionar Usuarios', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle('Detalles de Usuario #'.$model->id.''); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'cssFile'=>'/themes/detailview/styles.css',
	'attributes'=>array(
		'id',
		'Username',
		//'password',
		'nombre',
		'apellido',
		'ubicacionT0.codigoSAP',
		'esAdministrador',
	),
)); ?>


<br /><h2> This Anotaciones belongs to this Usuarios: </h2>
<ul><?php foreach($model->anotaciones as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->descripcion, array('anotaciones/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> This Autorizaciones belongs to this Usuarios: </h2>
<ul><?php foreach($model->autorizaciones as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->autorizado, array('autorizaciones/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> This CompetenciasUsuarios belongs to this Usuarios: </h2>
<ul><?php foreach($model->competenciasUsuarioses as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->id, array('competenciasusuarios/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> This Evaluaciones belongs to this Usuarios: </h2>
<ul><?php foreach($model->evaluaciones as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->fecha, array('evaluaciones/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> This Eventos belongs to this Usuarios: </h2>
<ul><?php foreach($model->eventoses as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->id, array('eventos/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> Estos documentos son de este  Usuarios: </h2>
<ul><?php foreach($model->metaDocs as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->numPedido, array('metadocs/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> Estos documentos son de este  Usuarios: </h2>
<ul><?php foreach($model->metaDocs1 as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->numPedido, array('metadocs/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> This Permisos belongs to this Usuarios: </h2>
<ul><?php foreach($model->permisoses as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->id, array('permisos/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> This Prestamos belongs to this Usuarios: </h2>
<ul><?php foreach($model->prestamoses as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->cedula, array('prestamos/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> This Prestamos belongs to this Usuarios: </h2>
<ul><?php foreach($model->prestamoses1 as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->cedula, array('prestamos/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2> This UbicacionTec belongs to this Usuarios: </h2>
<ul><?php foreach($model->ubicacionTecs as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->codigoSAP, array('ubicaciontec/view', 'id' => $foreignobj->id)));

				} ?></ul>