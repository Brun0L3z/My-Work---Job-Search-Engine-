<?
if(!empty($_POST['action']) && $_POST['action'] == 'search'){
	escape($_POST);
	$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['referer'] = BASE_URL;
	if (isset($_GET['p'])) $start_page = $_GET['p'];
	else $start_page = 1;
	$con = $error = '';
	// record search advance_keywords
	$_SESSION['advance_search_keywords'] = $advance_keywords;
	if($minexp > $maxexp){
		$error = "Mininum experience is greater than maximum experience.";
		$smarty->assign('error',$error);
	}

	if($error == ''){
	if($title_skills != '')
	{
		 $title_skills=trim($title_skills);
		
	}
	


	if ($title_skills != '' || $area != '')
	{
		
		$advance_keywords = trim($advance_keywords);
		$search = new Job();
		$smarty->assign('jobs', $search->AdvanceSearch($advance_keywords,$title_skills,$minexp, $maxexp,$minsalary, $maxsalary,$area,$industry,$start_page));
		$smarty->assign('rows' , $search->getRows());
		
	}
	else
	{
		if ($categ == '')
		{
			$smarty->assign('no_categ', 1);
		}
		else if ($categ == 'job_search')
		{
			$is_home = true;
			$smarty->assign('is_home', 1);
		}
		$smarty->assign('jobs', $job->GetJobs(0, $categ, 0, 0, 0));	
		
		
	}
	// if user hit enter after entering a search query, we know this causes a 
	// synchronous HTTP redirect, so apply a different template
	
	if (!empty($requestKeywords))
	{
		
		// save recorded advance_keywords, if available
		if ($_SESSION['advance_search_keywords'])
		{
			$search = new SearchKeywords($_SESSION['advance_search_keywords']);
			$search->Save();
			unset($_SESSION['advance_search_keywords']);
			
		}
		$smarty->assign('advance_keywords', stripslashes(htmlentities($requestKeywords, ENT_QUOTES, 'UTF-8')));
		$template = 'advance_search.tpl';
	
	}
	else
	{
	
		$smarty->assign('advance_keywords', stripslashes($advance_keywords));
		$smarty->assign('norecords', 1);
	
		
		 $template = 'posts-loop.tpl';

	}
	
	if (isset($_SESSION['search_pagination']))
	{
	
		$smarty->assign('pages', $_SESSION['search_pagination']);
	}
	}//error closed

}
$url=$_SERVER['QUERY_STRING'];
parse_str($url);
if (isset($_GET['p'])) $start_page = $_GET['p'];
	else $start_page = 1;
if(!empty($p)){
	$search = new Job();
	$smarty->assign('jobs', $search->AdvanceSearch($advance_keywords,$title_skills,$minexp, $maxexp,$minsalary, $maxsalary,$area,$industry,$start_page));
	$smarty->assign('rows' , $search->getRows());
	$template = 'posts-loop.tpl';
	if (isset($_SESSION['search_pagination']))
	{
		$smarty->assign('pages', $_SESSION['search_pagination']);
	}
}
$smarty->assign('year' , get_years());
$smarty->assign('salary' , get_salary());
$smarty->assign('industries',get_industries());
$smarty->assign('jobslist', jobs_list());
$template = 'advance_search.tpl';
?>