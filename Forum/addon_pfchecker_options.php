<?php

$displayFields=array(
$dbUserSheme['username'][1],
$dbUserSheme['user_email'][1],
$dbUserSheme['user_icq'][1],
$dbUserSheme['user_website'][1],
$dbUserSheme['user_occ'][1],
$dbUserSheme['user_from'][1],
$dbUserSheme['user_interest'][1],
);
// script will display all field values as specified here, "as is" in database, with no additional functions. The first specified value will be linked to user's profile. If you use some custom fields which are supposed to contain free text, it's time to mention them all here.

$pfupdateField=$dbUserSheme['user_profileupdate'][1];

$avatarsEnabled=TRUE; //if avatars are enabled, the script will try to display user's avatar
$avatarDbField=$dbUserSheme['user_custom1'][1]; // field which stores avatar's value - comment if you set the above option to FALSE or if 'user_custom1' field is not present in your users table

$signaturesEnabled=TRUE; //if signatures are enabled, the script will try to display user's signature
$sigDbField=$dbUserSheme['user_custom2'][1]; // field which stores signature - comment if you set the above option to FALSE or if 'user_custom2' field is not present in your users table

$photoAlbumEnabled=FALSE; //if this setting is enabled, script will try to display all pictures associated amongst the profile
//$picsDbField=$dbUserSheme['user_custompics'][1]; // field which stores amount of pictures - de-comment if you set the above option to TRUE

$verifyDataFile=$pathToFiles.'shared_files/profiles_verification.txt'; //this file will keep the date of the most recent checked profile

?>