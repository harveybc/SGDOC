<?php
$this->breadcrumbs=array(
	'Archivoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('app', 'Update'),
);

$this->menu=array(
	array('label'=>'List Archivos', 'url'=>array('index')),
	array('label'=>'Create Archivos', 'url'=>array('create')),
	array('label'=>'View Archivos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Archivos', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle(' Update Archivos #'.$model->id.' '); ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'archivos-form',
	'enableAjaxValidation'=>true,
)); 
echo $this->renderPartial('_form', array(
	'model'=>$model,
	'form' =>$form
	)); ?>

<div class="row buttons">
	<?php echo CHtml::submitButton(Yii::t('app', 'Update')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
