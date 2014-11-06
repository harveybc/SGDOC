<?php
$this->breadcrumbs=array(
	'Tablas De Contenidos'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Create'),
);

$this->menu=array(
	array('label'=>'Lista de TablasDeContenido', 'url'=>array('index')),
	array('label'=>'Manage TablasDeContenido', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle(' Create TablasDeContenido '); ?>

<?php 
if (isset($_GET['id']))
    {
        $model->metaDoc=$metaid;
    }
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tablas-de-contenido-form',
	'enableAjaxValidation'=>true,
)); 
echo $this->renderPartial('_form', array(
	'model'=>$model,
	'form' =>$form
	)); ?>

<div class="row buttons">
	<?php echo CHtml::submitButton(Yii::t('app', 'Create')); ?>
</div>

<?php $this->endWidget(); ?>

</div>
