<?php


	if(!file_exists('config.php')) 
	{
	   die('[index.php] config.php not found');
	}
	
	require_once 'config.php';
	
	$translator = new Translator(LANG_CODE);
	$translations = $translator->getTranslations();
	
	$smarty->assign('translations', $translations);
	
	$flag = 0;
	$js = array();
	if(!isset($_SERVER['HTTP_REFERER'])) {
	   $_SERVER['HTTP_REFERER'] = '';
	}
	
	$job = new Job();

	switch($page)
	{
		// home		
		case '':
			#show login page only if the admin is not logged in
			#else show homepage
			if(!isset($_SESSION['AdminId']))
			{
				require_once 'page_login.php';			
			}
			else
			{				
				require_once 'page_home.php';
			}
			$flag = 1;
			break;

		case 'logout':
			$flag = 1;
			if (isset($_SESSION['AdminId']))
			{			
				unset($_SESSION['AdminId']);
				redirect_to(BASE_URL);
				exit;
			}
			break;
			
		case 'home':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_home.php';
			$flag = 1;
			break;
			// case for user list
		case 'user':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_userlist.php';
			$flag = 1;
			break;
		case 'userothers':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_userothers.php';
			$flag = 1;
			break;
	   case 'search':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_search.php';
			$flag = 1;
			break;
	  case 'advance_search':
		if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
		require_once 'page_advance_search.php';			
		$flag = 1;
		break;
		
			//case for view the user list
        case 'view':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_view.php';
			$flag = 1;
			break;
			//case for delete the user from userlist
			case 'userdelete':
				if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_userdelete.php';
			$flag = 1;
			break;
			//case for clear cache
		case 'clear-cache':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_clearcache.php';
			$flag = 1;
			break;
		case 'spam':
            if(!isset($_SESSION['AdminId']))
            {
                redirect_to(BASE_URL);
                exit;
            }
            require_once 'page_spam.php';
            $flag = 1;
            break;
	   case 'activate':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_activate.php';
			$flag = 1;
			break;
	
	case 'deactivate':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_deactivate.php';
			$flag = 1;
			break;

	case 'delete':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_delete.php';
			$flag = 1;
			break;
           //delete for user
		   	if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_userdelete.php';
			$flag = 1;
			break;
		case URL_JOB:
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}			
			require_once 'page_job.php';
			$flag = 1;
			break;

		case URL_JOBS:
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_category.php';
			$flag = 1;
			break;

		case 'page-unavailable':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			$html_title = 'Page unavailable / ' . SITE_NAME;
			$template = 'error.tpl';
			$flag = 1;
			break;

		case 'stats':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_stats.php';
			$flag = 1;
			break;

		case 'pages':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_pages.php';
			$flag = 1;
			break;
		case 'userexcel':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_userexcel.php';
			$flag = 1;
			break;
		case 'categories':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_categories.php';
			$flag = 1;
			break;
		case 'types':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_types.php';
			$flag = 1;
			break;
		case 'password':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_password.php';
			$html_title = 'Change password / ' . SITE_NAME;
			$template = 'password.tpl';
			$flag = 1;
			break;
			case 'users':
	if (!isset($_SESSION['AdminId']) || (isset($_SESSION['AdminId']) && $_SESSION['AdminId'] > 1))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'page_users.php';
	$html_title = 'Add new users / ' . SITE_NAME;
	$template = 'users.tpl';
	$flag = 1;
	break;

		case 'links':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_links.php';
			$flag = 1;
			break;
		case 'features':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_features.php';
			$flag = 1;
			break;
		case 'settings':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_settings.php';
			$flag = 1;
			break;
		case 'edit-post':
			if(!isset($_SESSION['AdminId']))
			{
				redirect_to(BASE_URL);
				exit;
			}
			require_once 'page_edit_post.php';
			$flag = 1;
			break;
		case 'activate-spotlight':
            if(!isset($_SESSION['AdminId']))
            {
                redirect_to(BASE_URL);
                exit;
            }
            require_once 'page_activate_spotlight.php';
            $flag = 1;
            break;
   		case 'deactivate-spotlight':
            if(!isset($_SESSION['AdminId']))
            {
                redirect_to(BASE_URL);
                exit;
            }
            require_once 'page_deactivate_spotlight.php';
            $flag = 1;
            break;
   	case 'boxes':
	  		if(!isset($_SESSION['AdminId']))
            {
                redirect_to(BASE_URL);
                exit;
            }
            
   			require_once 'page_list.php';
   			$flag = 1;
   			break;
	case 'cities':
	  		if(!isset($_SESSION['AdminId']))
            {
                redirect_to(BASE_URL);
                exit;
            }
            
   			require_once 'page_cities.php';
   			$flag = 1;
   			$citiesPage = new CitiesPage();
   			$template = $citiesPage->processRequest($id, $extra, $smarty);
   			break;
	case 'industries':
	  		if(!isset($_SESSION['AdminId']))
            {
                redirect_to(BASE_URL);
                exit;
            }
            
   			require_once 'page_industries.php';
   			$flag = 1;
   			$industries = new Industry();
   			$template = $industries->processRequest($id, $extra, $smarty);
   			break;
	case 'qualification':
	  		if(!isset($_SESSION['AdminId']))
            {
                redirect_to(BASE_URL);
                exit;
            }
            
   			require_once 'page_qualification.php';
   			$flag = 1;
   			$qualification = new Qualification();
   			$template = $qualification->processRequest($id, $extra, $smarty);
   			break;
	case 'education':
	  		if(!isset($_SESSION['AdminId']))
            {
                redirect_to(BASE_URL);
                exit;
            }
            
   			require_once 'page_education.php';
   			$flag = 1;
   			$education = new Education();
   			$template = $education->processRequest($id, $extra, $smarty);
   			break;
	case 'area':
	  		if(!isset($_SESSION['AdminId']))
            {
                redirect_to(BASE_URL);
                exit;
            }
            
   			require_once 'page_area.php';
   			$flag = 1;
   			$area = new Area();
   			$template = $area->processRequest($id, $extra, $smarty);
   			break;
	default: 
			$flag = 0;	
			break;
	}
	// if page not found
	if ($flag == 0)
	{
		redirect_to(BASE_URL . 'page-unavailable/');
	}
	
	// create a JSON string from the translations array, but only for the "js" section
	$smarty->assign('translationsJson', iniSectionsToJSON(array("js" => $translations['js'])));
	
	// get job categories and cities
	$smarty->assign('categories', get_categories());
	$smarty->assign('settings_categories', $jobber_settings->GetSettingsCategories());

	//Add the dynamic URL defitions to SMARTY
	$smarty->assign('URL_JOB', URL_JOB);
	$smarty->assign('URL_JOBS', URL_JOBS);
	$smarty->assign('URL_CITIES', URL_CITIES);
	$smarty->assign('URL_COMPANIES', URL_COMPANIES);
	$smarty->assign('URL_JOBS_IN_CITY', URL_JOBS_IN_CITY);
	$smarty->assign('URL_JOBS_AT_COMPANY', URL_JOBS_AT_COMPANY);
	
	$smarty->assign('THEME', $settings['theme']);
	$smarty->assign('CURRENT_PAGE', $page);
	$smarty->assign('CURRENT_ID', $id);
	$smarty->assign('CURRENT_DIRECTORY', CURRENT_DIRECTORY);
	$smarty->assign('BASE_URL', BASE_URL_ORIG);
	$smarty->assign('BASE_URL_ADMIN', BASE_URL);
	$smarty->assign('HTTP_REFERER', $_SERVER['HTTP_REFERER']);
	if(isset($_SESSION['AdminId']))
		$smarty->assign('isAuthenticated', 1);
	else
		$smarty->assign('isAuthenticated', 0);
	$smarty->assign('js', $js);
	if (isset($template) && $template != '')
		$smarty->display($template);
?>