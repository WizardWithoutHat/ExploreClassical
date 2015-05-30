<?php
if (!defined('INCLUDED776')) die ('Fatal error.');

/* Anti-guest addon */

$membersRule=10; //defines amount of posts, which registered member should have in order to bypass the addon rules. Setting to 0 disables checking of members.

if( ($action=='ptopic' or $action=='pthread') and ($user_id==0 or ($membersRule>0 and $user_id!=1 and $isMod==0 and $user_num_posts<$membersRule) ) ) include ($pathToFiles.'addon_anti_guest.php');

/* --Anti-guest addon */

/* Who's Online */

$woDir=$pathToFiles.'shared_files'; //general path to your directory, for storing temporary plugin file and data. On Linux/FreeBSD/Unix systems, it must have 0777 privileges. Many miniBB plugins will use this directory, so if you already have one, it is better to keep one directory for all shared files. No slash at the end!

$enableAnonymous=1; //enable anonymous visits (by IP) - set to 0 (no) or 1 (yes) 

$enableHidden=0; //set this to 1 if you HAVE bundled the add-on with the "hidden" users options, else set to 0!

$expireTime=300; // in seconds - amount of activity time, after that time user activity is broken. 5 min = 300 sec.

include($pathToFiles.'addon_whosonline.php');

//condition to display the HTML code. Default: everybody. In the case of hidden mode bundled, switch on the alternative condition when only admin and unhidden members see it
//if($user_id==1 or ($enableHidden==1 and $user_id>1 and isset($user_online) and $user_online==1) ){

$whosOnline=<<<out
<table class="forumsmb">
<tr>
<td class="tbTransparent txtL" style="width:50%">
<span class="txtSm">{$l_whosOnline} {$l_guestsOnline} - {$guestsCount}<br />{$l_loggedOnline} - {$registeredCount} {$hiddenTxt} {$registeredList}</span>
</td>
<td class="tbTransparent txtR" style="width:50%">
<span class="txtSm">{$l_onlineRecord} {$recTotal} [{$recDate}]<br />{$l_guestsOnline} - {$w_record[1]} / {$l_loggedOnline} - {$w_record[2]}</span>
</td>
</tr>
</table>
out;

//}

/* --Who's Online */

/* Direct email addon */
$directEmailEnabled=TRUE;
$directEmailGuests=FALSE;
if($directEmailEnabled and $action=='userinfo') {
$fName=$pathToFiles.'lang/directemail_'.$lang.'.php';
if(file_exists($fName)) include($fName); else include($pathToFiles.'lang/directemail_eng.php');
}
if($directEmailEnabled and $action=='senddirect' and $genEmailDisable!=1) include($pathToFiles.'addon_directemail.php');
/* --Direct email addon */

/* email registrations addon */

if($action=='registernew' or $action=='register'){
$emailTitle=$emailTitleReg;
}
elseif($action=='prefs' or $action=='editprefs') {
$emailTitle=$emailTitlePrefs;
}

/* email registrations addon */

/* Moving replies */

if( ($user_id==1 or $isMod==1) and ($action=='vthread' or $action=='movepost' or $action=='delAvatarAdmin') ) include($pathToFiles.'addon_movepost2.php');

if( ($user_id==1 or $isMod==1) and $action=='vthread' and isset($enableGroupMsgDelete) and $enableGroupMsgDelete){
//display mass-move link at the bottom of the page

$massMoveLink="{$l_sepr} <a href=\"JavaScript:massMove();\">{$l_moveMass}</a>";

$massMoveJs=<<<out
function massMove(){
var el=document.forms['allMsgs'].elements;
var len=el.length;
var chMsNum=0;

for (var i=0;i<len;i++){
if (el[i].name.substring(0,9)=='deleteAll'){
if(el[i].checked) chMsNum++;
}
}

if(chMsNum<2) { alert ('{$l_moveCheck}'); return; }
else {

document.forms['allMsgs'].elements['action'].value='movepost';
document.forms['allMsgs'].target='_blank';
document.forms['allMsgs'].submit();

document.forms['allMsgs'].target='_self';
document.forms['allMsgs'].elements['action'].value='delmsg';

}
}
out;
}

/* --Moving replies */

function parseTopic(){
/* Unread Messages Indicator */
if($GLOBALS['user_id']==0) $GLOBALS['unreadicon']='';
else{

if(isset($GLOBALS['cols']) or (isset($GLOBALS['superStickyModule']) and isset($GLOBALS['colst'])) ){

if(!isset($GLOBALS['superStickyModule'])){
if($GLOBALS['action']=='') $chk=$GLOBALS['cols'][7]; else $chk=$GLOBALS['cols'][9];
}
else $chk=$GLOBALS['colst'][9];

if(!isset($GLOBALS['superStickyModule'])) $tid=$GLOBALS['cols'][0]; else $tid=$GLOBALS['colst'][0];
if( (!isset($GLOBALS['readTopics'][$tid]) and $chk>$GLOBALS['mslvPoint']) or (isset($GLOBALS['readTopics'][$tid]) and $chk>$GLOBALS['readTopics'][$tid] ) ) $GLOBALS['unreadicon']="&nbsp;&nbsp;<img src=\"{$GLOBALS['main_url']}/img/unread.gif\" style=\"width:8px;height:8px\" alt=\"Unread\" title=\"Unread\" />"; else $GLOBALS['unreadicon']='';

}

}
/* --Unread Messages Indicator */
}

/* Preview addon */
if(isset($_POST['prevForm']) and $_POST['prevForm']==1) include($pathToFiles.'addon_preview.php');
/* --Preview addon */

/* members list addon */
if(!isset($l_membersList)) $l_membersList='Members List';
if($action=='memberslist') include($pathToFiles.'addon_memberslist.php');
/* --members list addon */

/* Unread Messages Indicator */

//options

$cLimitTopics=100; //how many read topics to store in a cookie or database. Cookie size limit is about 4 Kb of data incl. cookie name and time. Unread topics hold topic id and last post id, so it depends on how big IDs have topics and posts. With DB, this is not limited, however you must keep in mind as more records are in a table, as more slower it will be.

$unreadMsgMode=1; //1 means we will use mySQL for storing the data; 0 - cookies

$cookieexptoptime=time()+31536000; //1 year

$Tun_point='minibbtable66_unreadpoint'; //table name if mySQL is used
$Tun_topics='minibbtable66_unreadtopics'; //table name if mySQL is used

if($user_id>0) $resetReadLink="<a href=\"{$main_url}/{$indexphp}action=resetread\">Mark All Messages Read</a> {$l_sepr} ";
else $resetReadLink='';

$showIconInForums=FALSE; //TRUE or FALSE - will show the Unread icon also in forum lists; it will take 2 extra requests from DB. Currently works only for $unreadMsgMode=1; mode.

//end of options

if($user_id>0){

if($unreadMsgMode==0){
//cookies mode

if(!isset($_COOKIE[$cookiename.'_mslv'])) $mslvPoint=0;
else $mslvPoint=(int)$_COOKIE[$cookiename.'_mslv'];

if($action=='vthread' and $topicData[9]>$mslvPoint){

$currtopics=array();

if(!isset($_COOKIE[$cookiename.'_tread'])){
$treadVal=$topic.'-'.$topicData[9];
}
elseif(preg_match("#[0-9_-]+#", $_COOKIE[$cookiename.'_tread'])){
if(substr_count($_COOKIE[$cookiename.'_tread'], '_')==0) {
$q=explode('-', $_COOKIE[$cookiename.'_tread']);
$currtopics[$q[0]]=$q[1];
}
else {
$ct=explode('_', $_COOKIE[$cookiename.'_tread']);
foreach($ct as $cc){
$q=explode('-', $cc);
$currtopics[$q[0]]=$q[1];
}

//$currtopics=explode('_', $_COOKIE[$cookiename.'_tread']);

}

//store up to 100 topics
if(is_array($currtopics) and (!isset($currtopics[$topic]) or $currtopics[$topic]<$topicData[9]) and sizeof($currtopics)+1>$cLimitTopics) {

$f=sizeof($currtopics)-$cLimitTopics;

$newcurrtopics=array();

$ee=1;
foreach($currtopics as $key=>$val){
if($f>=$ee) {
$ee++;
continue;
}
else{
$newcurrtopics[]=$key.'-'.$val;
}
}

//for($i=sizeof($currtopics)-1; $i>=$f; $i--) 

$treadVal=implode('_', $newcurrtopics);

}
elseif(!isset($currtopics[$topic]) or $currtopics[$topic]<$topicData[9]){
$currtopics[$topic]=$topicData[9];
$newcurrtopics=array();
foreach($currtopics as $key=>$val) $newcurrtopics[]=$key.'-'.$val;
//for($i=0; $i<sizeof($currtopics); $i++) $newcurrtopics[]=$currtopics[$i].'-'.$currposts[$i];
$treadVal=implode('_', $newcurrtopics);
}
else $treadVal=-1;

}

if($treadVal>=0) {
setcookie($cookiename.'_tread', '', (time()-2592000), $cookiepath, $cookiedomain, $cookiesecure);
setcookie($cookiename.'_tread', $treadVal, $cookieexptoptime, $cookiepath, $cookiedomain, $cookiesecure);
}
}

if($action=='resetread'){

if($row=db_simpleSelect(0, $Tp, 'post_id', '', '', '', 'post_id DESC', 1)) $mslvPoint=$row[0]; else $mslvPoint=0;

setcookie($cookiename.'_mslv', '', (time()-2592000), $cookiepath, $cookiedomain, $cookiesecure);
setcookie($cookiename.'_mslv', $mslvPoint, $cookieexptoptime, $cookiepath, $cookiedomain, $cookiesecure);

setcookie($cookiename.'_tread', '', (time()-2592000), $cookiepath, $cookiedomain, $cookiesecure);

header("{$rheader}{$main_url}/{$indexphp}");
exit;
}

if($action=='' or $action=='vtopic'){

$readTopics=array();

if(!isset($_COOKIE[$cookiename.'_tread']) or !preg_match("#[0-9_-]+#", $_COOKIE[$cookiename.'_tread'])) {}
else{
$currtopics=explode('_', $_COOKIE[$cookiename.'_tread']);

$ct=explode('_', $_COOKIE[$cookiename.'_tread']);
foreach($ct as $cc){
$q=explode('-', $cc);
$readTopics[$q[0]]=$q[1];
}

}

//print_r($readTopics);
//echo $mslvPoint;

if($showIconInForums){

$forumPosts=array();
$forumIcons=array();

if (isset($clForumsUsers)) $closedForums=getAccess($clForums, $clForumsUsers, $user_id); else $closedForums='n';
if ($closedForums!='n') {
$xtr=getClForums($closedForums,'where','','forum_id','and','!=');
$xtr2=getClForums($closedForums,'and','','forum_id','and','!=');
}
else {
$xtr='';
$xtr2='';
}

if($row=db_simpleSelect(0, $Tf, 'count(*)')) $forumsAmount=$row[0]; else $forumsAmount=0;

$uSql="select topic_last_post_id, forum_id, topic_id from {$Tt} where topic_last_post_id>'{$mslvPoint}' {$xtr2} order by topic_last_post_id desc";

if(($DB=='mysql' and $res=mysql_query($uSql) and mysql_num_rows($res)>0 and $row=mysql_fetch_row($res)) OR ($DB=='mysqli' and $res=mysqli_query($mysqlink, $uSql) and mysqli_num_rows($res)>0 and $row=mysqli_fetch_row($res))){
do{

if(!isset($forumPosts[$row[1]])){
if(!isset($readTopics[$row[2]]) or (isset($readTopics[$row[2]]) and $readTopics[$row[2]]<$row[0]) ) $forumPosts[$row[1]]="&nbsp;&nbsp;<img src=\"{$GLOBALS['main_url']}/img/unread.gif\" style=\"width:8px;height:8px\" alt=\"Unread\" title=\"Unread\" />";
}

if(sizeof($forumPosts)==$forumsAmount) break;

}
while( ($DB=='mysql' and $row=mysql_fetch_row($res)) OR ($DB=='mysqli' and $row=mysqli_fetch_row($res)) );
}

unset($xtr);
}

}

}//cookies mode

else{
//mysql mode

if($row=db_simpleSelect(0, $Tun_point, 'last_id', 'user_id', '=', $user_id)) $mslvPoint=$row[0]; else $mslvPoint=0;

if($action=='vthread' and $topicData[9]>$mslvPoint){

if($row=db_simpleSelect(0, $Tun_topics, 'post_id', 'topic_id', '=', $topic, '', '', 'user_id', '=', $user_id)) {
$sql_q="update {$Tun_topics} set post_id={$topicData[9]} where topic_id={$topic} and user_id={$user_id}";
if($DB=='mysql') mysql_query($sql_q);
elseif($DB=='mysqli') mysqli_query($mysqlink, $sql_q);
}
else{
$sql_q="insert {$Tun_topics} (topic_id, post_id, user_id) values ({$topic}, {$topicData[9]}, {$user_id})";
if($DB=='mysql') mysql_query($sql_q);
elseif($DB=='mysqli') mysqli_query($mysqlink, $sql_q);
}

//fix table limit
if($row=db_simpleSelect(0, $Tun_topics, 'count(*)', 'user_id', '=', $user_id)) $currStore=$row[0]; else $currStore=0;
if($currStore>$cLimitTopics){

$clm=$currStore;
if($row=db_simpleSelect(0, $Tun_topics, 'topic_id, post_id', 'user_id', '=', $user_id, 'post_id asc')) {
do{
$sql_q="delete from $Tun_topics where topic_id={$row[0]} and user_id=$user_id and post_id={$row[1]}";
if($DB=='mysql') mysql_query($sql_q);
elseif($DB=='mysqli') mysqli_query($mysqlink, $sql_q);
$clm--;
}
while($clm>$cLimitTopics and $row=db_simpleSelect(1));
}

}

}

if($action=='resetread'){

if($row=db_simpleSelect(0, $Tp, 'post_id', '', '', '', 'post_id DESC', 1)) $mslvPoint=$row[0]; else $mslvPoint=0;

$sql_q="delete from $Tun_topics where user_id=$user_id";
if($DB=='mysql') mysql_query($sql_q);
elseif($DB=='mysqli') mysqli_query($mysqlink, $sql_q);

if($row=db_simpleSelect(0, $Tun_point, 'last_id', 'user_id', '=', $user_id)) {
$sql_q="update {$Tun_point} set last_id={$mslvPoint} where user_id={$user_id}";
if($DB=='mysql') mysql_query($sql_q);
elseif($DB=='mysqli') mysqli_query($mysqlink, $sql_q);
}
else{
$sql_q="insert {$Tun_point} (last_id, user_id) values ({$mslvPoint}, {$user_id})";
if($DB=='mysql') mysql_query($sql_q);
elseif($DB=='mysqli') mysqli_query($mysqlink, $sql_q);
}

header("{$rheader}{$main_url}/{$indexphp}");
exit;
}

if($action=='' or $action=='vtopic'){

$readTopics=array();

if($row=db_simpleSelect(0, $Tun_topics, 'topic_id, post_id', 'user_id', '=', $user_id)){
do{
$readTopics[$row[0]]=$row[1];
}
while($row=db_simpleSelect(1));
}

//print_r($readTopics);
//echo $mslvPoint;

}

}//mysql mode

}//user_id>0


/* --Unread Messages Indicator */

function parseMessage(){

/* Moving replies link */
if($GLOBALS['user_id']==1 or $GLOBALS['isMod']==1){
if($GLOBALS['topicData'][5]==1) $ln=''; else $ln='&nbsp;';
$GLOBALS['moveLink']="{$ln}<a href=\"{$GLOBALS['main_url']}/{$GLOBALS['indexphp']}action=movepost&amp;post={$GLOBALS['cols'][6]}&amp;forum={$GLOBALS['forum']}\" target=\"_blank\">{$GLOBALS['l_move']}</a> ";
}
else $GLOBALS['moveLink']='';
/* --Moving replies link */


}

/* Highlight button */
if($user_id>0){
$button_hl=<<<out
<a href="JavaScript:paste_strinL(selektion,3,'[hl]\r\n','\r\n[/hl]','')" onmouseover="window.status='List'; return true" onmouseout="window.status=''; return true" onmousemove="pasteSel()"><img src="{$main_url}/img/button_hl.gif" alt="Highlight" title="Highlight" style="width:22px;height:22px"/></a>&nbsp;&nbsp;
out;
}
else $button_hl='';
/* --Highlight button */

/* Avatars addon */

if($action=='vthread') {
include($pathToFiles.'addon_avatar_options.php');
$fName=$pathToFiles.'lang/avatars_'.$lang.'.php';
if(file_exists($fName)) include($fName); else include($pathToFiles.'lang/avatars_eng.php');
if($staticAvatarSize) $avatarDim=' style="width:'.$maxAvatarWidth.'px;height:'.$maxAvatarHeight.'px"';
}

if($action=='userinfo' or ($GLOBALS['enableProfileUpdate'] and ($action=='prefs' or $action=='editprefs' or $action=='avatarupload1' or $action=='avatarupload2' or $action=='avatardelete' or $action=='avatarchoose1' or $action=='avatarchoose2')) OR ($action=='removeuser' and isset($_POST['step']) and $_POST['step']=='remove') OR (defined('ADMIN_PANEL') and $action=='searchusers2' and isset($_POST['delus'])) OR $action=='delAvatarAdmin') include($pathToFiles.'addon_avatar.php');

if($action=='vthread' and ($user_id==1 or $isMod==1)) {
$delAvatarJs=<<<out
function confirmDeleteAvatar(user, addstr){
var csrfcookie=getCSRFCookie();
if(csrfcookie!='') csrfcookie='&csrfchk='+csrfcookie;
if(confirm('{$l_deleteAvatar}?')) document.location='{$main_url}/{$indexphp}action=delAvatarAdmin&user='+ user + addstr + csrfcookie;
else return;
}
out;
}

function parseUserInfo_user_custom1($av){
if(!isset($GLOBALS['cols'][0])) {
$GLOBALS['cols'][0]=$GLOBALS['user'];
$addStr='';
}
else{
$addStr="&amp;forum={$GLOBALS['forum']}&amp;topic={$GLOBALS['topic']}&amp;page={$GLOBALS['page']}";
}
if(isset($GLOBALS['avatarDim'])) $avatarDim=$GLOBALS['avatarDim']; else $avatarDim='';

if( ($GLOBALS['user_id']==1 or $GLOBALS['isMod']==1) and $av!='' and $GLOBALS['action']=='vthread') {
$a1="<a href=\"JavaScript:confirmDeleteAvatar({$GLOBALS['cols'][0]},'{$addStr}');\" onmouseover=\"window.status=''; return true;\" onmouseout=\"window.status=''; return true;\">";
$a2='</a>';
$alt=$GLOBALS['l_deleteAvatar'];
}
else { $a1=''; $a2=''; $alt=''; }

if($av!='' and substr_count($av, '.')>0) $im="{$a1}<img src=\"{$GLOBALS['main_url']}/img/forum_avatars/{$av}\" alt=\"{$alt}\" title=\"{$alt}\"{$avatarDim} />{$a2}";
elseif($av!='' and strlen($av)==3) $im="{$a1}<img src=\"{$GLOBALS['avatarUrl']}/{$GLOBALS['cols'][0]}.{$av}\" alt=\"{$alt}\" title=\"{$alt}\"{$avatarDim} />{$a2}";
else $im='';

if($GLOBALS['action']=='vthread' and $im!='') $im='<br />'.$im;

return $im;
}

/*--Avatars addon */

/* Signatures */

function parseUserInfo_user_custom2($av){
if($av!='') $av='<table style="width:100%;margin-top:7pt"><tr><td class="txtSm txtR" style="width:100%;border-top:1px dashed #CDCDCD">'.$av.'</td></tr></table>';
return $av;
}

/* --Signatures */

/* Profiles verification add-on */
if($user_id==1 or $isMod==1){
$pfverifyView="<a href=\"{$main_url}/{$indexphp}action=pfcheck\">Check Profiles</a>&nbsp;{$l_sepr}&nbsp;";
include($pathToFiles.'addon_pfchecker_options.php');
if($action=='pfcheck') include($pathToFiles.'addon_pfchecker.php');
}
/* --Profiles verification add-on */

?>