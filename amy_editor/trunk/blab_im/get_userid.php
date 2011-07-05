<?php 

require_once 'config.php';
require_once 'incl/main.inc';

dbconnect(); session_start();
$settings=get_settings(); get_user(); $options=get_options(); 

if(!isset($_SESSION['bmf_id'])){die();}
$user=null;
if(isset($_GET['guest_name'])){
	$guest=trim($_GET['guest_name']);
	$query='SELECT * FROM '.$dbss['prfx']."_users WHERE usr_name='$guest'";
	$result=neutral_query($query);
	if(neutral_num_rows($result)>0){
		$user=neutral_fetch_array($result);
		if(isset($user['usr_id'])){ ?>
			id_collab11 = <?php print $user['usr_id'].';';
		} 
	}
} 

?>

