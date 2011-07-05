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

if(typeof bim_path=='undefined'){bim_path='<?php print $site_to_bim;?>';}
opt_fsnd=bim_path+'<?php print $skin_dir.'/sounds/snd'. $options[4];?>.swf';
enable_url=bim_path+'index.php?enable=1';
ajx_updt=<?php print $settings['main_refresh'];?>;
ucppopup=<?php print $settings['popup_ucp'];?>;
ucpwidth=<?php print $settings['ucp_width'];?>;
ucpheight=<?php print $settings['ucp_height'];?>;
ucpeffect=<?php if($settings['ucp_effect']>0 && $options[3]>0){print '1';}else{print '0';}?>;
document.writeln('<div style="<?php print $bar_style;?>" id="blabimbar"></div>');
<?php if(!isset($_COOKIE['bmf_disable'])){?>
document.writeln('<script type="text/javascript" src="'+bim_path+'incl/bar.js"></script>');
<?php }else{?>
document.getElementById('blabimbar').innerHTML='<input type="button" style="font-weight:bold;background-color:#fff;color:#000;border-width:0px" value="&nbsp;<?php print $bim_disable;?>&nbsp;" onclick="window.location=enable_url" />';
<?php }?>
