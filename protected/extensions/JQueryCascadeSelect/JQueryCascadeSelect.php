<?php
/**
 * @author imasia (paul)
 * @param string $action: the action where the data are retrieved
 * @param string $chained: the id of the source of the selection
 * JS lib by Mike Nichols
 */
class JQueryCascadeSelect extends CWidget {

    private $jBaseUrl;

    public $items = array();

    public function init()
    {
        $this->jBaseUrl=Yii::app()->getAssetManager()->publish(dirname(__FILE__).'/'.'js');
        $this->registerClientScript();
        parent::init();
    }

    protected function registerClientScript()
    {
        $cs=Yii::app()->clientScript;

        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile($this->jBaseUrl.'/'.'jquery.cascade.js');
        $cs->registerScriptFile($this->jBaseUrl.'/'.'jquery.cascade.ext.js');
        $cs->registerScriptFile($this->jBaseUrl.'/'.'jquery.templating.js');
        
        $cs->registerScript('commonTemplate', 
        	'function commonTemplate(i) {return "<option value=\'" + i.Value + "\'>" + i.Text + "</option>";};');
        
        $cs->registerCssFile($this->jBaseUrl.'/'.'cascade.css');
    }

    public function run(){}
    
    
    public function makeActiveDropDown($model, $id, $data, $htmlOptions = array(), $action, $chained)
    {
    	$controller=$this->controller;
		
    	$thisId = CHtml::activeId($model, $id);
        $chainedId = CHtml::activeId($model, $chained);
    	Yii::app()->clientScript->registerScript('jqcascadeselect'.$id,
    		"jQuery('#".$thisId."').cascade('#".$chainedId."',{	
				ajax: {url: 'index.php?r=".$action."' },	
				template: commonTemplate});",
            CClientScript::POS_READY);
        
      	return CHtml::activeDropDownList($model,$id, $data, $htmlOptions);
    }
    
	public function makeDropDown($id, $selected = '', $data, $htmlOptions = array(), $action, $chained)
    {
    	$controller=$this->controller;
    	Yii::app()->clientScript->registerScript('jqcascadeselect'.$id,
    		"jQuery('#".$id."').cascade('#".$chained."',{".	
				"ajax: {url: 'index.php?r=".$action."' },".	
				"template: commonTemplate});",
            CClientScript::POS_READY);
        
      	return CHtml::dropDownList($id, $selected, $data, $htmlOptions);
    }
    
}
