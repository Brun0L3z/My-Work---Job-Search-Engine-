<?
if(!empty($_POST['action']) && $_POST['action'] == 'search'){
	escape($_POST);
	$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['referer'] = BASE_URL;
	if (isset($_GET['p'])) $start_page = $_GET['p'];
	else $start_page = 1;
	$con = $error = '';
	// record search advance_keywords
	$_SESSION['advance_search_keywords'] = $location;
	if($minexp !='' && $maxexp != ''){
		if($minexp > $maxexp){
			$error = "Mininum experience is greater than maximum experience.";
			$smarty->assign('error',$error);
		}
	}
	if($minsalary != '' && $maxsalary != ''){
		if($minsalary > $maxsalary){
			$salary_error = "Mininum salary is greater than maximum salary.";
			$smarty->assign('salary_error',$salary_error);
		}
	}
	if($error == '' && $salary_error == ''){
		$location = trim($location);
		$title_skills = trim($title_skills);
		$search = new Userlist();
		$smarty->assign('users', $search->AdvanceSearch($location,$title_skills,$minexp, $maxexp,$minsalary, $maxsalary,$area,$industry,$start_page));
		if($title_skills != ''){
			$smarty->assign('keywords',$title_skills);
		}
		$smarty->assign('p','new_page');
		$smarty->assign('rows' , $search->getRows());
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
	$search = new Userlist();
	$smarty->assign('users', $search->AdvanceSearch($location,$title_skills,$minexp, $maxexp,$minsalary, $maxsalary,$area,$industry,$start_page));
	if($title_skills != ''){
		$smarty->assign('keywords',$title_skills);
	}
	$smarty->assign('rows' , $search->getRows());
	$template = 'advance_search.tpl';
	if (isset($_SESSION['search_pagination']))
	{
		$smarty->assign('pages', $_SESSION['search_pagination']);
	}
}
$smarty->assign('year' , get_years());
$smarty->assign('salary' , get_salary());
$smarty->assign('cities' , get_cities());
$smarty->assign('industries',get_industries());
$smarty->assign('jobslist', jobs_list());
$template = 'advance_search.tpl';
?>