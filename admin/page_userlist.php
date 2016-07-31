<?php
    if($_GET['mode'] == 'delete') 
	{
          if($_GET['id']) 
		   {
          $query = "DELETE FROM user_info WHERE id='" . mysql_real_escape_string($_GET['id']) . "'";
          mysql_query($query);
	      }
	 }
	$user = new Userlist($id); 
	$userCount =  $user->getuserCount();
	$smarty->assign('users_count', $userCount);
	$paginatorLink = BASE_URL."user" ;
	$paginator = new Paginator($userCount,JOBS_PER_PAGE, @$_REQUEST['p']);
	$paginator->setLink($paginatorLink);
	$paginator->paginate();
	$firstLimit = $paginator->getFirstLimit();
	$lastLimit = $paginator->getLastLimit();
    $the_users = $user->GetPaginateduser($firstLimit, JOBS_PER_PAGE, $id);
	$smarty->assign("pages", $paginator->pages_link);
    $smarty->assign('user', $the_users);
	$smarty->assign('count' , $userCount);
	$template = 'userlist.tpl';
?>