<?php
$this->breadcrumbs=array(
	'Documentos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('app', 'Actualizar'),
);

$this->menu=array(
	array('label'=>'Lista de Documentos', 'url'=>array('index')),
	array('label' => 'Ingresar Doc. Físico', 'url' => array('/Documentos/createFisico')),
            array('label' => 'Subir Doc. Electrónico', 'url' => array('/Documentos/createSubir')),
            array('label' => 'Crear Doc. Online', 'url' => array('/Documentos/createOnline')),
	array('label'=>'Detalles Documento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Documentos', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle(' Actualizar Documentos: '.$model->titulo); ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'meta-docs-form',
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
