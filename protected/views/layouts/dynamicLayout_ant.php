<?php $this->beginContent('//layouts/responsiveContent'); ?>
<?php

function dibujaMenu($obj) {
    //TODO: provisional: para uso de roles de admin, ingeniero y usuario.
    $esAdmin = 0;
    $esIngeniero = 0;
    if (!Yii::app()->user->isGuest) {
        $modeloU = Usuarios::model()->findBySql('select * from usuarios where Username="' . Yii::app()->user->name . '"');
    }
    if (isset($modeloU)) {
        $esAdmin = $modeloU->Es_administrador;
        $esIngeniero = $modeloU->Es_analista;
        if ($esAdmin)
            $esIngeniero = 1;
    }



    $obj->widget('application.extensions.mbmenu.MbMenu', array(
        'cssFile' => '/themes/mbMenu/mbmenuVertical.css',
        'items' => array(
            array('label' => 'Inicio', 'url' => array('/site/inicio'), 'visible' => !Yii::app()->user->isGuest,),
            array('label' => 'Documentos', 'url' => array('/site/page', 'view' => 'unidadDoc'), 'visible' => !Yii::app()->user->isGuest,
                'items' => array(
                    array('label' => 'Gestionar Documentos', 'url' => array('/metaDocs/admin')),
                    array('label' => 'Unidades Documentales', 'url' => array('/documentos/admin')),
                    array('label' => 'Autorizaciones', 'url' => array('/autorizaciones/admin')),
                    array('label' => 'Anotaciones', 'url' => array('/anotaciones/admin')),
                ),
            ),
            array('label' => 'Configuración', 'url' => array('/site/page', 'view' => 'configuracion'), 'visible' => (Yii::app()->user->name == 'admin'),
                'items' => array(
                    //array('label' => 'Competencias', 'url' => array('/competencias/admin')),
                    array('label' => 'Cervecerias', 'url' => array('/cervecerias/admin')),
                    array('label' => 'Fabricantes', 'url' => array('/fabricantes/admin')),
                    array('label' => 'Idiomas', 'url' => array('/idiomas/admin')),
                    array('label' => 'Medios', 'url' => array('/medios/admin')),
                    array('label' => 'Módulos', 'url' => array('/modulos/admin'), 'visible' => (Yii::app()->user->name == 'admin')),
                    array('label' => 'Operaciones', 'url' => array('/operaciones/admin'), 'visible' => (Yii::app()->user->name == 'admin')),
                    array('label' => 'Permisos', 'url' => array('/permisos/admin'), 'visible' => (Yii::app()->user->name == 'admin')),
                    array('label' => 'Secuencias', 'url' => array('/secuencias/admin')),
                    array('label' => 'Tipos de Contendido', 'url' => array('/tipoContenidos/admin')),
                    array('label' => 'Ubicación Técnica', 'url' => array('/ubicacionTec/admin')),
                ),
            ),
            array('label' => 'Administración', 'url' => array('/site/page', 'view' => 'administracion'), 'visible' => (Yii::app()->user->name == 'admin'),
                'items' => array(
                    array('label' => 'Evaluaciones', 'url' => array('/evaluaciones/admin')),
                    array('label' => 'Evaluaciones Generales', 'url' => array('/evaluacionesGenerales/admin')),
                    array('label' => 'Eventos', 'url' => array('/eventos/admin')),
                    array('label' => 'Usuarios', 'url' => array('/usuarios/admin')),
                ),
            ),
            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
            array('label' => 'Préstamos', 'url' => array('/prestamos/admin')),
            //array('label'=>'Ayuda', 'url'=>array('/site/page', 'view'=>'about')),
            array('label' => 'CBM', 'url' => 'http://cbm:81'),
            //array('label'=>'Contacto', 'url'=>array('/site/contact')),

            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
        ),
    ));
}
?>
<div class="container" id="hMainContainer">
    <!-- Para layout_5 : 1367 + -->
    <div id="layout_5">
        <div id="block_l5_bizquierdo" class="bizquierdo layout_5">
            <div id="block_l5_logos" class="logos layout_5">
                <div class="grid-block logoDer layout_5" id="block_l5_logoDer">
                    <img src="/images/logoDer.png"  class="logoDer"/>
                </div>
                <div class="grid-block layout_5" id="block_l5_logoIzq" >
                    <img src="/images/logoIzq.png" class="logoIzq"/>
                </div>
            </div>
            <div class="grid-block menus  layout_5" id="block_l5_menus" style="text-align:center;">
                <div id="mainMbMenu">
                    <b >Menú Principal</b>
                    <?php dibujaMenu($this); ?>       
                </div>
            </div>
            <div class="grid-block operationsVertical  layout_5" id="block_l5_operations">
                <b>Operaciones</b>
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'operationsH'),
                ));
                ?>
            </div>


        </div>
        <div id="block_l5_bcentro" style="display:inline-block" class="bcentro">
            <!-- Para layout_4 : 1024 a 1366 -->
            <div id="block_l4_headers" class="headers layout_4 logos2">
                <div class="grid-block logoDer" id="block_l4_logoDer">
                    <img src="/images/logoDer.png"  class="logoDer"/>
                </div>
                <div class="grid-block logoIzq" id="block_l4_logoIzq">
                    <img src="/images/logoIzq.png"  class="logoIzq"/>
                </div>
            </div>
            <div id="block_l4_bcenter" class="bcenter">
                <div style="margin-top:4px;" class="grid-block menus menuHorizontal" id="block_l4_menusHorizontal">
                    <div id="mainMbMenu">
                        <?php dibujaMenu($this); ?>       
                    </div>
                </div>
                <div class="grid-block operations" id="block_l4_operations" style="text-align:center;">

                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => $this->menu,
                        'htmlOptions' => array('class' => 'operationsH'),
                    ));
                    ?>
                </div>

            </div>
            <div style="margin-top:4px;" class="grid-block menus menuHorizontal" id="block_l4_l3_menusHorizontal">
                <div id="mainMbMenu">
                    <?php dibujaMenu($this); ?>       
                </div>
            </div>

            <div class="grid-block operations layout_3" id="block_l3_operations">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'operationsH'),
                ));
                ?>
            </div>

            <div class="grid-block menu_icons layout_2" id="block_l2_menu_icons">

            </div>
            <div class="grid-block operations_icons layout_2" id="block_l2_operations_icons">

            </div>
            <div id="content_2c" style="text-align:center;" class="content_2c grid-block">
                <!-- Línea decorativa superior -->
                <div style="padding: 0px;margin:0px 0px 0px 0px;display: block;" class="lineaSuperior">
                    <?php echo '<hr style="border-color:#ac8b3a;color:#ac8b3a;background-color:#ac8b3a;height: 2px;margin: 0px 0px 0px 0px;"/>'; ?>
                </div>
                <!-- Breadcrumbs-->
                <div style="width:20%;padding: 0px;margin:4px 0px 0px 0px;display: inline-block;float: left;text-align:left;" class="hBreadcrumbs">
                    <?php if (isset($this->breadcrumbs) && (!Yii::app()->user->isGuest)): ?>
                        <?php
                        echo '<b style="padding: 0px;margin:0px 4px 0px 0px;display: inline-block;float: left;">Ubicación:</b>';
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links' => $this->breadcrumbs,
                            'htmlOptions' => array('style' => 'display:inline-block;float:left;'),
                        ));
                        ?><!-- breadcrumbs -->
                    <?php endif ?>
                </div>
                <!-- Título de la PÁgina -->
                <div style="width:57%;padding: 0px;margin:4px 0px 0px 0px;display: inline-block;text-align:center;" class="hPageTitle">                 
                    <?php echo '<h2>' . $this->PageTitle . '</h2>'; ?>
                </div>
                <!-- Link superior a Inicio -->
                <div style="width:  20%;padding: 0px;margin:4px 0px 0px 0px;display: inline-block;float: right;font-size: 0.9em;text-align: right;" class="hLinkInicio">
                    <?php echo CHtml::link(Yii::t('app', 'Ir a búsqueda'), '/index.php/site/inicio', array('style' => 'text-align:right;')); ?>                            
                </div>
                <!-- CONTENIDO -->
                <div style="padding: 0px;margin:0px;display:block;text-align:left;">
                    <!-- Print content -->
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>
</div>
 
<?php $this->endContent(); ?>


