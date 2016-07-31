<?php
	if (isset($_GET['p'])) $start_page = $_GET['p'];
	else $start_page = 1;
	$requestKeywords = str_replace('"', '', $_POST['keywords']);
	$url=$_SERVER['QUERY_STRING'];
	parse_str($url);
	$job = new Userlist();
	if(!empty($_POST['action']) && $_POST['action'] == 'search'){
	escape($_POST);
	$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['referer'] = BASE_URL;
	// record search keywords
	$_SESSION['search_keywords'] = $keywords;
	if ($keywords != '' || $keywords != ' ')
	{
		$keywords = trim($keywords);
		$smarty->assign('users', $job->Simple_Search($keywords, $url_query, $start_page));
		$smarty->assign('keywords',$keywords);
		$smarty->assign('p','new_page');
	}
	if (isset($_SESSION['search_pagination']))
	{
		$smarty->assign('pages', $_SESSION['search_pagination']);
	}
 }
if($p !='' || $keywords != ''){

	 if ($keywords != '' || $keywords != ' ')
	{
		$keywords = trim($keywords);
		$smarty->assign('users', $job->Simple_Search($keywords, $url_query, $start_page));
		$smarty->assign('rows' , $job->getRows());
	}
	if (isset($_SESSION['search_pagination']))
	{
		$smarty->assign('pages', $_SESSION['search_pagination']);
	}
	 if ($keywords != '' && !strstr($keywords, '|'))
	{
		$smarty->assign('keywords', stripslashes(htmlentities($keywords, ENT_QUOTES, 'UTF-8')));
		$smarty->assign('rows' , $job->getRows());
		$template = 'search.tpl';
	}
 }
 else{
	$template = 'search.tpl';
 }
?>