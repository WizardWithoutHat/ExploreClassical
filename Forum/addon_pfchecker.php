<?php
/*
addon_pfchecker.php : plug-in for watching users profiles updates in miniBB.
This file is part of miniBB. miniBB is free discussion forums/message board software, without any warranty. See COPYING file for more details.
Copyright (C) 2009,2012-2013 Paul Puzyrev. www.minibb.com
Latest File Update: 2013-Mar-25
*/
if (!defined('INCLUDED776')) die ('Fatal error.');

if(!isset($l_profilesVerification)) $l_profilesVerification='Profiles Verification';
if(!isset($l_profilesCheck)) $l_profilesCheck='Check out';
$title.=$l_profilesVerification;

if(isset($_GET['update']) and file_exists($verifyDataFile)){
$f=fopen($verifyDataFile, 'w');
fwrite($f, (int)$_GET['update']+1);
fclose($f);
clearstatcache();
header("Refresh: 0; url={$main_url}/{$indexphp}action=pfcheck");
exit;
}

if(file_exists($verifyDataFile)) {
$startDate=(int)file_get_contents($verifyDataFile);
}
else $startDate=0;

$select='';
foreach($displayFields as $d) $select.=$d.', ';

if($avatarsEnabled) {
include($pathToFiles.'addon_avatar_options.php');
$select.="{$avatarDbField}, ";
}

if($signaturesEnabled) $select.="{$sigDbField}, ";

if($photoAlbumEnabled) {
include($pathToFiles.'addon_pics_options.php');
$select.="{$picsDbField}, ";
}

$select.="{$pfupdateField}";

//$select=substr($select, 0, strlen($select)-2);

$displayFieldsAmount=sizeof($displayFields);

if($row=db_simpleSelect(0, $Tu, 'count(*)', $pfupdateField, '>=', $startDate)){
$numRows=$row[0];
}
else $numRows=0;

if($numRows>0){

$pageNav=pageNav($page,$numRows,"{$main_url}/{$indexphp}action=pfcheck",$viewmaxsearch,FALSE);
if($pageNav!='') $mbpn='mb'; else $mbpn='';
$makeLim=makeLim($page,$numRows,$viewmaxsearch);

$tmpl=<<<out
<table class="forumsmb">
<tr><td class="caption3"><a href="{$main_url}/{$startIndex}">{$sitename}</a> / {$l_profilesVerification}</td></tr>
</table>
<table class="tbTransparent{$mbpn}">
<tr><td class="tbTransparentCell"><span class="txtSm"><b>{$pageNav}&nbsp;</b></span></td></tr>
</table>

<table class="forums{$mbpn}">

out;

if($row=db_simpleSelect(0, $Tu, $dbUserId.','.$select, $pfupdateField, '>=', $startDate, "{$pfupdateField} asc", $makeLim)){

do{

$cc=0;

//echo $displayFieldsAmount;
//print_r($row); exit;

$avatar='';
if($avatarsEnabled) {
$cc++;
$avatarValue=$row[$displayFieldsAmount+$cc];
if($avatarValue!=''){

if(file_exists("{$avatarDir}/{$row[0]}.{$avatarValue}")) $avatarDisp="{$avatarUrl}/{$row[0]}.{$avatarValue}";
else $avatarDisp="{$main_url}/img/forum_avatars/{$avatarValue}";

$avatar="<br /><img src=\"{$avatarDisp}\" border=0 alt=\"\" title=\"\" />";
}
}

$signature='';
if($signaturesEnabled){
$cc++;
if($row[$displayFieldsAmount+$cc]!='') $signature='<br /><span class="txtSm">Signature</span>: '.$row[$displayFieldsAmount+2];
}

/* Photo Album */

$pictures='';
if($photoAlbumEnabled){

if($usePicProportional==0) $picsDim="width:{$maxThPicWidth}px;height:{$maxThPicHeight}px;";
elseif($usePicProportional==1) $picsDim="height:{$maxThPicHeight}px;";
elseif($usePicProportional==2) $picsDim="width:{$maxThPicWidth}px;";
else $picsDim='';

$cc++;

$picsDesc='';
$pics='';
$picValue=(int)$row[$displayFieldsAmount+$cc];

if($picValue>0){
include($picsDir.'/'.$row[0].'/picdata.php');
foreach($picData as $key=>$val) {

if($val[0]!='') $picsDesc.='('.$val[0].') ';

//for($i=1; $i<=$picValue; $i++){
if(file_exists("{$picsDir}/{$row[0]}/{$key}_th.jpg") and (file_exists("{$picsDir}/{$row[0]}/{$key}.jpg") or file_exists("{$picsDir}/{$row[0]}/{$key}.png"))) {

if(file_exists("{$picsDir}/{$row[0]}/{$key}.png")) $origFullExt='png'; else $origFullExt='jpg';

if($guestShowThumbnails) {
$srcTh="{$picsUrl}/{$row[0]}/{$key}_th.jpg";
}
else {
$srcTh="{$main_url}/{$viewFilename}?user={$row[0]}&amp;pic={$key}_th";
}

if($guestShowFullsize) {
$srcFull="{$picsUrl}/{$row[0]}/{$key}.{$origFullExt}";
}
else {
$srcFull="{$main_url}/{$viewFilename}?user={$row[0]}&amp;pic={$key}&amp;ext={$origFullExt}";
}

$pics.="<a href=\"{$srcFull}\" target=\"_blank\"><img src=\"{$srcTh}\" alt=\"#{$key}\" title=\"#{$key}\" style=\"{$picsDim}\" /></a> ";
}
else {
$picsDim.='border:1px #000 solid';
$pics.="<img src=\"{$main_url}/img/p.gif\" alt=\"#{$key} - Deleted?\" title=\"#{$key} - Deleted?\" style=\"{$picsDim}\" /> ";
}
//}

}

$pictures=<<<out
<tr>
<td class="caption5" colspan="2">{$picsDesc}<br />{$pics}</td>
</tr>
out;
}
}

/* --Photo Album */

$cc++;
$profileUpdatedTime=$row[$displayFieldsAmount+$cc];
$profileUpdated=convert_date(date('Y-m-d H:i:s', $profileUpdatedTime));

/* Regular fields */

$freeText='';
for($i=1; $i<$displayFieldsAmount; $i++){
if($displayFields[$i]=='user_website') $displayVal="<a href=\"{$row[$i+1]}\" target=\"_blank\">{$row[$i+1]}</a>";
else $displayVal=$row[$i+1];

if($row[$i+1]!='') $freeText.="<span class=\"txtSm\">{$displayFields[$i]}</span>: {$displayVal}<br />";
}

if($user_id==1){
$delLink=" {$l_sepr} <a href=\"{$main_url}/{$bb_admin}action=removeuser1&amp;userID={$row[0]}\" target=\"_blank\">{$l_delete}</a>";
}
else $delLink='';

$tmpl.=<<<out
<tr>
<td class="tbClCp" style="width:20%;vertical-align:top"><a href="{$main_url}/{$indexphp}action=prefs&amp;adminUser={$row[0]}" target="_blank">{$row[1]}</a>{$avatar}</td>
<td class="caption5"  style="width:80%;vertical-align:top">{$freeText}{$signature}</td>
</tr>
{$pictures}
<tr>
<td class="caption5 txtR" colspan="2"><span class="txtSm">Profile Updated: {$profileUpdated} {$l_sepr} <a href="{$main_url}/{$indexphp}action=pfcheck&amp;update={$profileUpdatedTime}" title="Check This Profile and Above as Verified">{$l_profilesCheck}</a>{$delLink}</span><hr style="width:100%;margin-top:2pt" /></td>
</tr>
out;

}
while($row=db_simpleSelect(1));

}

$tmpl.=<<<out
</table>
<table class="tbTransparent{$mbpn}">
<tr><td class="tbTransparentCell"><span class="txtSm"><b>{$pageNav}&nbsp;</b></span></td></tr>
</table>

out;
}

else{
$errorMSG='No updated profiles found!';
$tmpl=ParseTpl(makeUp('main_warning'));
}


echo load_header();
echo $tmpl;
return;

?>