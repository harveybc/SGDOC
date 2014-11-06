<?php
$this->breadcrumbs=array(
	'Eventos'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Create'),
);

$this->menu=array(
	array('label'=>'Lista de Eventos', 'url'=>array('index')),
	array('label'=>'Gestionar Eventos', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle(' Crear Eventos '); ?>
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
	<?php echo CHtml::submitButton(Yii::t('app', 'Aceptar')); ?>
</div>

<?php $this->endWidget(); ?>

</div>
