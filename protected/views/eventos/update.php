<?php
$this->breadcrumbs=array(
	'Eventos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('app', 'Update'),
);

$this->menu=array(
	array('label'=>'Lista de Eventos', 'url'=>array('index')),
	array('label'=>'Nuevo Evento', 'url'=>array('create')),
	array('label'=>'Detalles Evento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Eventos', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle(' Actualizar Evento #'.$model->id.' '); ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'eventos-form',
	'enableAjaxValidation'=>true,
)); 
echo $this->renderPartial('_form', array(
	'model'=>$model,
	'form' =>$form
	)); ?>

<div class="row buttons">
	<?php echo CHtml::submitButton(Yii::t('app', 'Actualizar')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
