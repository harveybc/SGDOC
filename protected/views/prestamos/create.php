<?php
$this->breadcrumbs=array(
	'Préstamos'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Crear'),
);

$this->menu=array(
	array('label'=>'Lista de Préstamos', 'url'=>array('index')),
	array('label'=>'Gestionar Préstamos', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle(' Crear Préstamos '); ?>

<?php 
if (isset($_GET['id']))
    {
        $model->metaDoc=$metaid;
    }
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prestamos-form',
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
