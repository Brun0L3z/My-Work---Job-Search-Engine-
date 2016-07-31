<?php

	
	
	if(!file_exists('_config/config.php')) 
	{
	   die('[index.php] _config/config.php not found');
	}
	
	require_once '_config/config.php';

	define('BASE_URL', APP_URL);
	error_reporting(E_ALL ^ E_NOTICE);
	$translator = new Translator(LANG_CODE);
	$translations = $translator->getTranslations();
	
	$smarty->assign('translator', $translator);
	$smarty->assign('translations', $translations);
	
	// create a JSON string from the translations array, but only for the "js" section
	$smarty->assign('translationsJson', iniSectionsToJSON(array("js" => $translations['js'])));
	
	$flag = 0;
	
	$job = new Job();
	
	$meta_description = '';
	$meta_keywords = '';
	
	if(!isset($_SERVER['HTTP_REFERER'])) 
	{
	   $_SERVER['HTTP_REFERER'] = '';
	}
	$html_title = 'Under Construction';
			$template = 'under_construction.tpl';
			$flag = 1;
	
				 		
			 
	// if page not found
	if ($flag == 0)
	{
		redirect_to(BASE_URL . 'page-unavailable/', '404');
	}
	
	// get job categories and cities
	$smarty->assign('categories', get_categories());
	$smarty->assign('articles', get_articles());
	$smarty->assign('navigation', get_navigation());
	
	$smarty->assign('THEME', $settings['theme']);
	$smarty->assign('CURRENT_PAGE', $page);
	$smarty->assign('CURRENT_ID', $id);
	$smarty->assign('BASE_URL', BASE_URL);
	$smarty->assign('HTTP_REFERER', $_SERVER['HTTP_REFERER']);

	//Add the dynamic URL defitions to SMARTY
	$smarty->assign('URL_JOB', URL_JOB);
	$smarty->assign('URL_JOBS', URL_JOBS);
	$smarty->assign('URL_CITIES', URL_CITIES);
	$smarty->assign('URL_COMPANIES', URL_COMPANIES);
	$smarty->assign('URL_JOBS_IN_CITY', URL_JOBS_IN_CITY);
	$smarty->assign('URL_JOBS_AT_COMPANY', URL_JOBS_AT_COMPANY);
	
	if (isset($html_title) && $html_title != '')
		$smarty->assign('html_title', $html_title);
	if (isset($meta_description) && $meta_description != '')
		$smarty->assign('meta_description', $meta_description);
	if (isset($meta_keywords) && $meta_keywords != '')
		$smarty->assign('meta_keywords', $meta_keywords);

	if (isset($template) && $template != '')
		$smarty->display($template);
?>