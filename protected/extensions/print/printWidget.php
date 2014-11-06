<?php
/**
 * 
  * @desc printWidget class file.
 * 
 * @author Vladimir Kovarsky <vkovarsky@gmail.com>
 * 
 * @copyright Copyright &copy; 2009 Algo-rithm
 * 
 * @version 1.0 
 *
 *
 * @desc printWidget renders print button(s)  and provides functionality to print out
 * 				selected html element(s) (table or div, for example),
 *                   		the selector may any permissible in jQuery, multiple selection results are also supported
 *
 * Usage:
 * 1) copy all the 'print' catalogue under /protected/extensions
 * 2) add to your view page (several times, if needed - as many as you wish!):
 *       <?php $this->widget('application.extensions.print.printWidget', array(
 *                       'property1'=>'value1',
 *                       'property2'=>'value2')); 
 *        ?>
 *    where possible properties with their default values are:
 * 
 * @var 'cssFile' = 'print.css'         string      css file name. It's tuned for $printedElement = '.dataGrid' by default.
 *                                                  In case you change $printedElement, you MUST edit this file, 
 *                                                  and the content of this file is absolutely up to you!
 * @var 'coverElement' = '#page'        string      css selector (understanding by jQuery $()-function) 
 *                                                  of the element, which covers fully <body></body>, 
 *                                                  it's <div id='page'></div> by default
 * @var 'printedElement' = '.dataGrid'  string      css selector (understanding by jQuery $()-function) 
 *                                                  of the element, whoose content is to be printed,
 *                                                  <table class='dataGrid'></table> by default
 * @var 'title' = ''                    string      title of the printed page
 * @var 'htmlOptions' = array()         array       htmlOptions array - standard for Yii
 * 
 */

 class printWidget extends CWidget
{
    /**
    * @desc css file name. It's tuned for $printedElement = '.dataGrid' by default.
    * In case you change $printedElement, you MUST edit this file, 
    * and the content of this file is absolutely up to you!
    */
	public $cssFile = 'print.css';
    
    /**
    * @desc The css selector (understanding by jQuery $()-function) 
    * of the element, which covers fully <body></body>, 
    * it's <div id='page'></div> by default
    */
    public $coverElement = '#page';
    
    /**
    * @desc The css selector (understanding by jQuery $()-function) 
    * of the element, whoose content is to be printed.
    * If several elements match, all of them will be output to print.
    * By default, it is
    * <table class='dataGrid'></table> by default
    */
    public $printedElement = '.dataGrid';
        
    /**
    * @desc The title of the page to be printed
    */
    public $title = '';
    
    /**
    * @desc htmloptions array
    */
    public $htmlOptions = array();
    
    /**
    * @desc counter of widget instancies, is used in order to avoid code repetitions
    */
    static $count = 0;

    public function init()
    {
        $path = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'media';
        $url = Yii::app()->getAssetManager()->publish($path); 
        $imgUrl = $url.'/print.gif';
        echo CHtml::link("<img src=\"$imgUrl\" class=\"img_link\" title=\"".Yii::t('lms', 'print')."\">", 
                        "#", array_merge($this->htmlOptions, array('onclick'=>'return processPrint();')));
        self::$count++;
        if (self::$count == 1) {
            $cs = Yii::app()->getClientScript();
            $cs->registerCssFile($url.'/'.$this->cssFile);
            Yii::app()->clientScript->registerCoreScript('jquery'); 

            echo CHtml::script("
                var firstTime = true;
                function processPrint()
                {
                    if (firstTime) {
                        \$('{$this->coverElement}').addClass('printWidgetScreenCover');
                        
                        title = '{$this->title}';
                        if (title != '')
                            \$('<h3 class=\'printWidgetPrintedElement\'>'+title+'</h3>').appendTo('body');
                        
                        arrayEl = \$('{$this->printedElement}').get();
                        for (var i=0; i<arrayEl.length; i++) {
                            clonedEl = \$(arrayEl[i]).clone();
                            clonedEl.addClass('printWidgetPrintedElement');
                            clonedEl.appendTo('body');
                        }
                        
                        firstTime = false;
                    }
                    window.print();
                    return false;
                }
            ");
            echo CHtml::css("
                .printWidgetScreenCover {display: none;}
                .printWidgetPrintedElement {display: block; margin: 20px;}
                ",
                "print"
            );
            echo CHtml::css("
                .printWidgetPrintedElement {display: none;}
            ",
            "screen"
            );
        }
    }

}