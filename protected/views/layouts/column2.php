<?php 

function ieversion2() {
    preg_match('/MSIE ([0-9]\.[0-9])/', $_SERVER['HTTP_USER_AGENT'], $reg);
    if (!isset($reg[1])) {
        return -1;
    } else {
        return floatval($reg[1]);
    }
}
function getLayoutCBM()
{
$versionIE = ieversion2();
if (($versionIE < 9) && ($versionIE > 5))
    {
return('//layouts/column1_layout');
    }
else
    return('//layouts/dynamicLayout');
    //return('//layouts/column1');
}

$this->renderPartial(getLayoutCBM(),array('content'=>$content),false,false);

?>