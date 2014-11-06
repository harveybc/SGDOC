<?php
$this->breadcrumbs = array(
	'Documentos',
	Yii::t('app', 'Index'),
);

$this->menu=array(
	array('label' => 'Ingresar Doc. Físico', 'url' => array('/Documentos/createFisico')),
            array('label' => 'Subir Doc. Electrónico', 'url' => array('/Documentos/createSubir')),
            array('label' => 'Crear Doc. Online', 'url' => array('/Documentos/createOnline')),
	array('label'=>Yii::t('app', 'Gestionar') . ' Documentos', 'url'=>array('admin')),
);
?>

<?php $this->setPageTitle('Documentos'); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
