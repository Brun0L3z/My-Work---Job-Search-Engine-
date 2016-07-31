<?php 
$user_cache = '../_templates/' . THEME . '/_cache/'; 
$admin_cache = '_templates/_cache/'; 
 
foreach(glob($user_cache .'*.php') as $uc) 
{    
unlink($uc); 
} 
$smarty->assign('user_success', 1);
 
foreach(glob($admin_cache .'*.php') as $ac) 
{
  unlink($ac);
}
$smarty->assign('admin_success', 1);
	$template = 'clear-cache.tpl';
?>