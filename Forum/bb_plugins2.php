<?php
if (!defined('INCLUDED776')) die ('Fatal error.');

/* Profiles verification add-on */
if( $user_id!=1 and isset($isMod) and $isMod==0 and ( ($action=='register' and isset($insres) and $insres!=0) OR ($action=='editprefs') OR ($action=='pics' and isset($_POST['step']) and $_POST['step']=='upload2') OR ($action=='prefs' and isset($_GET['avatar']) and (int)$_GET['avatar']==1) ) ){

if($action=='register' and isset($insres) and $insres!=0) $uid=$insres;
elseif($user_id==1 or $isMod==1 and isset($adminUser)) $uid=$adminUser;
else $uid=$user_id;

if($uid>0){
include($pathToFiles.'addon_pfchecker_options.php');
$$pfupdateField=time();
updateArray(array($pfupdateField), $Tu, $dbUserId, $uid);
}

}
/* --Profiles verification add-on */

?>