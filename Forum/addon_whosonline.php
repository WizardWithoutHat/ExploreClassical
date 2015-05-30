<?php
/*
addon_whosonline.php : instant who's online box for miniBB 2.
This file is part of miniBB. miniBB is free discussion forums/message board software, without any warranty. See COPYING file for more details. Copyright (C) 2005-2007, 2014 Paul Puzyrev. www.minibb.com
Latest File Update: 30-Apr-2014
*/

if (!defined('INCLUDED776')) die ('Fatal error.');

function elementss($array_name,$r_array,$cont=''){
$cont.='array(';
foreach($r_array as $key=>$val){
$cont.="'$key'=>";
if(is_array($val)) $cont.=elementss($key,$val).',';
else $cont.="'{$val}',";
}
return substr($cont,0,strlen($cont)-1).')';
}

function printOutArray($array_name){
if(is_array($GLOBALS[$array_name])) $r_array=$GLOBALS[$array_name]; else $r_array=array();
if(sizeof($r_array)==0) return "\${$array_name}=array()";
else return "\${$array_name}=".elementss($array_name,$r_array);
}

function writeFile($w_anonymous_visits,$w_logged_users,$w_record){
$cont='<?php'."\n".printOutArray('w_anonymous_visits').";\n".printOutArray('w_logged_users').";\n".printOutArray('w_record').";\n?>";
$tmpfname=tempnam($GLOBALS['woDir'],'');
$fl=fopen($tmpfname,'w');
//flock($fl,LOCK_EX);
fwrite($fl,$cont);
//flock($fl,LOCK_UN);
fclose($fl);
if (@rename ($tmpfname, $GLOBALS['woDir'].'/addon_whosonline_data.php')==FALSE){
unlink($GLOBALS['woDir'].'/addon_whosonline_data.php');
rename($tmpfname, $GLOBALS['woDir'].'/addon_whosonline_data.php');
}
umask(0);
chmod($GLOBALS['woDir'].'/addon_whosonline_data.php', 0777);
}

$registeredList='';

$w_anonymous_visits=array(); $w_logged_users=array(); $w_record=array();

if(!file_exists($woDir.'/addon_whosonline_data.php')){
writeFile($w_anonymous_visits,$w_logged_users,$w_record);
}

include($woDir.'/addon_whosonline_data.php');

if($user_id==1 and isset($_GET['resetwonline'])) {
$w_record[1]=0; $w_record[2]=0;
}

/* Associate any user with unique session number */
if(!isset($_COOKIE[$cookiename.'_anol'])) {
$tsess=abs(ip2long($thisIp)).rand(1,999);
setcookie($cookiename.'_anol', $tsess, 0, $cookiepath, $cookiedomain, $cookiesecure);
if($user_id==0) $tsess=FALSE;
}
else {
$tsess=trim($_COOKIE[$cookiename.'_anol']);
$tscheck=str_replace(array('0','1','2','3','4','5','6','7','8','9','0'), '', $tsess);
if($tscheck!='') $tsess=FALSE;
}

/* Handling registered users. */
if($user_id!=0) {
$w_logged_users[$user_id]=array($user_usr,time(),$tsess);
if(isset($enableHidden) and $enableHidden==1) $w_logged_users[$user_id][]=$user_online;
if(isset($w_anonymous_visits[$tsess])) unset($w_anonymous_visits[$tsess]);
}

if($enableAnonymous==1){

if($user_id==0){
if($tsess) {
$tsess=str_replace("'", '', $tsess);
$w_anonymous_visits[$tsess]=time();
}
}

/* Deleting unnecessary anonymous users */
foreach($w_anonymous_visits as $key=>$val) if((time()-$val)>$expireTime) unset($w_anonymous_visits[$key]);

/* Counting anonymous users */
$guestsCount=sizeof($w_anonymous_visits);
if(!$tsess) $guestsCount+=1;
}
else $guestsCount='N/A';

/* Delete unnecessary registered users */
foreach($w_logged_users as $key=>$val) {
//(isset($w_anonymous_visits[$val[2]]) or
if( ((time()-$val[1])>$expireTime) OR ($user_id==0 and $val[2]==$tsess) ) unset($w_logged_users[$key]);
}

if((sizeof($w_logged_users)+sizeof($w_anonymous_visits))>($w_record[1]+$w_record[2])) $w_record=array(0=>date('Y-m-d H:i:s'),1=>sizeof($w_anonymous_visits), 2=>sizeof($w_logged_users));

writeFile($w_anonymous_visits,$w_logged_users,$w_record);

/* Counting registered users */
$registeredCount=sizeof($w_logged_users);

$hiddenCount=0;
$usersOnline=array();

if($registeredCount>0){
$registeredList.='[';
foreach($w_logged_users as $key=>$val){

if(!isset($enableHidden) or $enableHidden==0){
$registeredList.=" <a href=\"{$main_url}/{$indexphp}action=userinfo&amp;user={$key}\">{$val[0]}</a>, ";
$usersOnline[$key]=TRUE;
}
else{

if($user_id==1 or (isset($val[3]) and $val[3]==1)){
$registeredList.=" <a href=\"{$main_url}/{$indexphp}action=userinfo&amp;user={$key}\">{$val[0]}</a>, ";
$usersOnline[$key]=TRUE;
}
else{
$hiddenCount++;
}

}

}

if($registeredList!='[') $registeredList=substr($registeredList,0,strlen($registeredList)-2).' ]';
else $registeredList='';

}

$recDate=convert_date($w_record[0]);
$recTotal=$w_record[1]+$w_record[2];
if($hiddenCount>0) $hiddenTxt="({$l_onlineHidden}: {$hiddenCount})"; else $hiddenTxt='';

?>