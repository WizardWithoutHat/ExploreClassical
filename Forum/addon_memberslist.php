<?php
/*
addon_memberslist.php : memberlist add-on for miniBB.
This file is part of miniBB. miniBB is free discussion forums/message board software, without any warranty.
Check COPYING file for more details.
Copyright (C) 2004-2006, 2008-2009, 2012-2014 Paul Puzyrev. www.minibb.com
Latest File Update: 2014-Oct-28
*/

if (!defined('INCLUDED776')) die ('Fatal error.');
if (!defined('NOFOLLOW')) $nof=' rel="nofollow"'; else $nof='';

/*
//Uncommenting the code below, you will allow only logged in members to view the members list

if ($user_id<1){ 
$errorMSG='You must be logged to see the member list!'; 
echo load_header(); 
echo ParseTpl(makeUp('main_warning')); 
display_footer();
exit; 
}
*/

/* Get list */
$morder=(isset($_GET['morder'])?operate_string($_GET['morder']):'username');
$memberSearch=(isset($_GET['memberSearch'])?operate_string($_GET['memberSearch']):'');
$memberSearchVal=(isset($_GET['memberSearchVal'])?$_GET['memberSearchVal']:'');

if($morder=='user_id') $dbUserSheme[$morder][1]=$dbUserId;
if(!isset($dbUserSheme[$morder])) $morder='username';

$memberFieldsDropDown=makeValuedDropDown(array('username'=>$l_usrInfo[1], $dbUserId=>'ID', 'user_from'=>$l_usrInfo[8]), 'memberSearch');

$uniC='';$uniV='';$uniF='';
if($memberSearchVal!='') {

$uniV=$memberSearchVal=operate_string($memberSearchVal);

if($memberSearch=='username') {
$uniV='%'.operate_string($memberSearchVal).'%';
$uniC=' like ';
}
else {
$uniV=operate_string($memberSearchVal); 
$uniC='=';
}

$uniF=$dbUserSheme['username'][1];
if($memberSearch!='') {
if (isset($dbUserSheme[$memberSearch])) $uniF=$dbUserSheme[$memberSearch][1];
elseif($memberSearch==$dbUserId) $uniF=$dbUserId;
}

}

/* Restricting from viewing inactive accounts */
if($uniC==''){
$uniF=$dbUserAct; $uniC='='; $uniV='1';
$uniF2=''; $uniC2=''; $uniV2='';
}
else{
$uniF2=$dbUserAct; $uniC2='='; $uniV2='1';
}

if($rs=db_simpleSelect(0,$Tu,'count(*)',$uniF, $uniC, $uniV, '', '', $uniF2, $uniC2, $uniV2)) $numUsers=$rs[0]; else $numUsers=0;
$makeLim=makeLim($page,$numUsers,$viewmaxsearch);
$pageNav=pageNav($page,$numUsers,"{$main_url}/{$indexphp}action=memberslist&amp;morder={$morder}&amp;memberSearch={$memberSearch}&amp;memberSearchVal={$memberSearchVal}",$viewmaxsearch,FALSE);

if($row=db_simpleSelect(0, $Tu,"{$dbUserId}, {$dbUserSheme['username'][1]}, {$dbUserSheme['user_email'][1]}, {$dbUserSheme['user_icq'][1]}, {$dbUserSheme['user_website'][1]}, {$dbUserSheme['user_from'][1]}, {$dbUserSheme['user_viewemail'][1]}, {$dbUserDate}", $uniF, $uniC, $uniV, $dbUserSheme[$morder][1], $makeLim, $uniF2, $uniC2, $uniV2)){
$cell=makeUp('addon_members_cell');
$memberList='';
$aa=-1;
do{
if($aa<0) $bg='tbCel1'; else $bg='tbCel2';
$aa=-$aa;

$userId=$row[0];
$username="<a href=\"{$indexphp}action=userinfo&amp;user={$row[0]}\">$row[1]</a>";
$user_icq=$row[3];
if(trim($row[4])!='') $user_website="<a href=\"{$row[4]}\" target=\"_blank\"{$nof}>".wordwrap($row[4],30,'<br>',1)."</a>"; else $user_website='';
$user_from=$row[5];
$user_regdate=convert_date($row[7]);
if($row[6]!=0) $user_email=$row[2]; else $user_email='&nbsp;';

$memberList.=ParseTpl($cell);
}
while($row=db_simpleSelect(1));
}

$title=$title.$l_membersList;
echo load_header();
$mainTpl=makeUp('addon_members');
if($pageNav=='') $mainTpl=preg_replace("#<!--pageNav-->(.*?)<!--/pageNav-->#is", '', $mainTpl);
echo ParseTpl($mainTpl);

?>