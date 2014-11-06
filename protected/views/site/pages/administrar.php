<?php $this->pageTitle=Yii::app()->name; ?>


<?php
$this->pageTitle=Yii::app()->name . ' - Administrar';
$this->breadcrumbs=array(
	'Administrar',
); ?>
<h><b>Por favor seleccione uno de los siguientes items para realizar operaciones (crear, borrar, editar, buscar o listar):</b></h>
        
	<br></br><a href="/index.php/evaluaciones/admin">Evaluaciones</a>
        <br></br><a href="/index.php/evaluacionesgenerales/admin" >Evaluaciones Generales</a>
	<br></br><a href="/index.php/eventos/admin">Eventos</a> 
        <br></br><a href="/index.php/usuarios/admin">Usuarios</a>
        