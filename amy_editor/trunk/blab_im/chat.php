<?php

if(isset($_GET['u'])){$u=(int)$_GET['u'];}else{$u=0;} if($u<1){die();}

require_once 'config.php';
require_once 'incl/main.inc';

dbconnect(); session_start();
$settings=get_settings(); get_user(); $options=get_options(); $lang=get_language();

if(!isset($_SESSION['bmf_id']) || !isset($_SESSION['bmf_name'])){die();}
////////////////////////////////////////////
//$status=get_status(); 

//if(!isset($_SESSION['bmf_id']) || !isset($_SESSION['bmf_name'])){die();}

$_SESSION['bmf_last']=0;

//$title=htmrem($settings['html_title']).' '.$lang['screen_name'];

if(isset($_GET['guest_name'])){
	$guest=trim($_GET['guest_name']);
	$_SESSION['bmf_name'] = $guest;
	$guest=neutral_escape($guest,32,'str');
	$uid=(int)$_SESSION['bmf_id'];

	$query='SELECT * FROM '.$dbss['prfx']."_users WHERE usr_name='$guest'";
	$result=neutral_query($query);

	if(strlen($guest)>2 && neutral_num_rows($result)<1){
		$query='UPDATE '.$dbss['prfx']."_users SET usr_name='$guest' WHERE usr_id=$uid";
		neutral_query($query);//redirect('ucp_settings.php',2,0);
	}
}
////////////////////////////////////////////


$bim_id=(int)$_SESSION['bmf_id'];

$file_list='';
include $skin_dir.'/'.$emo_file;

$sm_tag=array(); $sm_img=array();

for($i=0;$i<count($emoticons);$i++){
$csm=explode(' ',$emoticons[$i]);
if(isset($csm[1])){$sm_tag[]="'$csm[0]'";$sm_img[]="'$csm[1]'";}}

$sm_tag=implode(',',$sm_tag);
$sm_img=implode(',',$sm_img);

$title=htmrem($settings['html_title']);

include $skin_dir.'/templates/head.pxtm';
include $skin_dir.'/templates/chat.pxtm';

?>
