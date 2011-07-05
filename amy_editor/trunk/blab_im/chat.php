<?php
require_once 'config.php';
require_once 'incl/main.inc';

dbconnect(); session_start();
if(isset($_GET['u'])){
	$u=(int)$_GET['u'];
}elseif(isset($_GET['u_name'])){
	$u_name=trim($_GET['u_name']);
	$query='SELECT * FROM '.$dbss['prfx']."_users WHERE usr_name='$u_name'";
	$result=neutral_query($query);
	if(neutral_num_rows($result)<1){
		$u=neutral_fetch_array($result);
		$u=htmrem($u['usr_id']);
	}else{$u=0;}
}else{$u=0;}

$settings=get_settings(); get_user(); $options=get_options(); $lang=get_language();

if(!isset($_SESSION['bmf_id']) || !isset($_SESSION['bmf_name'])){die();}
////////////////////////////////////////////
//$status=get_status(); 
$_SESSION['bmf_last']=0;
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

//please save me! --
if($u<1){
	$query='SELECT * FROM '.$dbss['prfx']."_chatting WHERE chatto=$bim_id ORDER BY usr_id ASC";
	$result=neutral_query($query);

	$list="";
	if(neutral_num_rows($result)>0){
		$u=neutral_fetch_array($result);
		$u=$u['usr_id'];
	}
}

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
