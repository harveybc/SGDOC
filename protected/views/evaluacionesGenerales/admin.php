<?php
$this->breadcrumbs=array(
	'Evaluaciones Generales'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Gestionar'),
);

$this->menu=array(
		array('label'=>Yii::t('app',
				'Lista de Evaluaciones Generales'), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Nueva Evaluación General'),
				'url'=>array('create')),
			);

		Yii::app()->clientScript->registerScript('search', "
			$('.search-button').click(function(){
				$('.search-form').toggle();
				return false;
				});
			$('.search-form form').submit(function(){
				$.fn.yiiGridView.update('evaluaciones-generales-grid', {
data: $(this).serialize()
});
				return false;
				});
			");
		?>

<?php $this->setPageTitle(' Gestionar&nbsp;Evaluaciones Generales'); ?>

<?php echo CHtml::link(Yii::t('app', 'Búsqueda Avanzada'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'evaluaciones-generales-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
       'cssFile' => '/themes/gridview/styles.css',     'template'=> '{items}{pager}{summary}',     'summaryText'=>'Resultados del {start} al {end} de {count} encontrados',
	'columns'=>array(
		//'id',
		'descripcion',
		'fechaInicio',
		'fechaFin',
		'pregunta1',
		'pregunta2',
		/*
		'pregunta3',
		'pregunta4',
		'pregunta5',
		'pregunta6',
		'pregunta7',
		'pregunta8',
		'pregunta9',
		'pregunta10',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
