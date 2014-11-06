<?php
$this->breadcrumbs=array(
	'Competencias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('app', 'Actualizar'),
);

$this->menu=array(
	array('label'=>'Lista de Competencias', 'url'=>array('index')),
	array('label'=>'Nueva Competencia', 'url'=>array('create')),
	array('label'=>'Detalles Competencia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Competencias', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle(' Actualizar Competencias #'.$model->id.' '); ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'competencias-form',
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
