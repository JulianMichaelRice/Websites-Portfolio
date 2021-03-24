<?php
require "../../config_lootius.php";

if(!$auth) {
    echo 'not authorized to access page';
    exit;
}

function print_r2($val){
        echo '<pre>';
        print_r($val);
        echo  '</pre>';
}

$pretty = function($v='',$c="&nbsp;&nbsp;&nbsp;&nbsp;",$in=-1,$k=null)use(&$pretty){$r='';if(in_array(gettype($v),array('object','array'))){$r.=($in!=-1?str_repeat($c,$in):'').(is_null($k)?'':"$k: ").'<br>';foreach($v as $sk=>$vl){$r.=$pretty($vl,$c,$in+1,$sk).'<br>';}}else{$r.=($in!=-1?str_repeat($c,$in):'').(is_null($k)?'':"").(is_null($v)?'&lt;NULL&gt;':"$v");}return$r;};

   exec('../../virtualenv/hunting/3.7/bin/python ../../lootius_mayhem/main.py', $result);
   echo $pretty($result);
?>
