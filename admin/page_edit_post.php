<?php

	//Note: $id is a job ID
parse_str($_SERVER["QUERY_STRING"]);	
if ($job_id != 0)
	{
		$job = new Job($job_id);
	}
	else
	{
		$job = new Job();
	}
	
	$jobToEdit = $job->GetInfo();
	$smarty->assign_by_ref('job', $jobToEdit);
	$smarty->assign('show_preview', false);
	
	if (!empty($_POST))
	{
		// validation
		$errors = array();
		
       if ($_POST['category_id'] == '')
			$errors['category_id'] = $translations['jobs']['category_error'];
	   if ($_POST['state_id'] == '')
			$errors['state_id'] = $translations['jobs']['state_error'];
	   if ($_POST['city_id'] == '')
			$errors['city_id'] = $translations['jobs']['city_error'];

        if ($_POST['company'] == '')
			$errors['company'] = $translations['jobs']['name_error'];
		
		if ($_POST['area'] == '')
			$errors['area'] = $translations['jobs']['area_error'];

		if ($_POST['qualification'] == '')
		    $errors['qualification'] = $translations['jobs']['qualification_error'];

		if ($_POST['industry'] == '')
			$errors['industry'] = $translations['jobs']['industry_error'];
		
		if ($_POST['title'] == '')
			$errors['title'] = $translations['jobs']['title_error'];
		
		if ($_POST['description'] == '')
			$errors['description'] = $translations['jobs']['description_error'];
		
		if ($_POST['poster_email'] == '')
			$errors['poster_email'] = $translations['jobs']['email_error'];
		
		if ($_POST['url'] == '')
			$errors['url'] = $translations['jobs']['url_error'];
		
		if ($_POST['skills'] == '')
			$errors['skills'] = $translations['jobs']['skills_error'];
         
		if($_POST['minexp'] == '' && $_POST['maxexp'] == '')
			$errors['minexp'] = 'chose any value ';
		  if($_POST['minexp']=='')
		     {
			  $_POST['minexp']=='0';
		   }
		  if($_POST['salary'] == '')
			$errors['salary'] = 'Give salary in given format';
		  			
		if(!empty($_POST['salary']))
          {
		   if(!preg_match("/^([0-9]{0,3}+\.)+[0-9]{0,3}$/",$_POST['salary']))
			{
			$errors['salary'] = 'Give salary in given format';
			}
			   else
			{
				$valid = true;
			}
          }
		if($_POST['minexp'] == $_POST['maxexp'])
			$errors['exp'] = 'MINexp should be less than Maxexp';

		if($_POST['minexp'] > $_POST['maxexp'])
			$errors['exp'] = 'MINexp should be less than Maxexp';
		
		if (!validate_email($_POST['poster_email']))
			$errors['poster_email'] = $translations['jobs']['email_invalid'];
		
		if (isset($_POST['apply_online']) && $_POST['apply_online'] == 'on')
		{
			$_POST['apply_online'] = 1;
		}
		else
		{
			$_POST['apply_online'] = 0;
		}

		$isCitySelected = false;

		// we didn't receive a city (when the cities combo is disabled)
		if (!isset($_POST['city_id']))
			$city_id = 0;
		else
		{
			$city_id = $_POST['city_id'];
			$isCitySelected = true;
		}
		//area name dispalyed 
		$isAreaSelected = false;

		// we didn't receive a city (when the cities combo is disabled)
		/*if (!isset($_POST['area']))
			$area = 0;
		else
		{
			$area = $_POST['area'];
			$isAreaSelected = true;
		}*/				
		$jobToEdit['company'] = $_POST['company'];
		$jobToEdit['url'] = $_POST['url'];
		$jobToEdit['title'] = $_POST['title'];
		$jobToEdit['city_id'] = $city_id;
		$jobToEdit['state_id'] = $_POST['state_id'];
		$jobToEdit['location_outside_ro_where'] = ($isCitySelected ? '' : $_POST['location_outside_ro_where']);
		$jobToEdit['category_id'] = $_POST['category_id'];
		$jobToEdit['type_id'] = $_POST['type_id'];
		$jobToEdit['description'] = $_POST['description'];
		$jobToEdit['skills'] = $_POST['skills'];
		$jobToEdit['apply'] = '';
		$jobToEdit['poster_email'] = $_POST['poster_email'];
		$jobToEdit['apply_online'] = $_POST['apply_online'];
		//$jobToEdit['type_var_name'] = get_type_varname_by_id($_POST['type_id']);
		$jobToEdit['type_id'] = $_POST['type_id'];
		$jobToEdit['textiledDescription'] = $textile->TextileThis($_POST['description']);
		$jobToEdit['location_outside_ro'] = $jobToEdit['location_outside_ro_where'];
		$jobToEdit['salary'] = $_POST['salary'];
       	$jobToEdit['minexp'] = $_POST['minexp'];
		$jobToEdit['maxexp'] = $_POST['maxexp'];
		$jobToEdit['industry'] = $_POST['industry'];
		$jobToEdit['functional_area'] = $_POST['functional_area'];
		$jobToEdit['qualification'] = $_POST['qualification'];
		$is_location_anywhere = $jobToEdit['city_id'] == 0 && $jobToEdit['location_outside_ro'] == '';
		$jobToEdit['is_location_anywhere'] = $is_location_anywhere;
		if (!$is_location_anywhere)
		{
			if ($isCitySelected)
			{
				$city = get_city_by_id($city_id);
				
				$jobToEdit['location'] = $city['name'];
			}
			else
				$jobToEdit['location'] = $jobToEdit['location_outside_ro'];
		}
			
		// no errors
		if (empty($errors))
		{
			if ($_POST['show_preview'] == 'true')
				$smarty->assign('show_preview', true);
			else
			{
				escape($_POST);	
				
				$data = array('id' => $job_id,
							  'company' => $company,
				          	  'url' => $url,
				              'title' => $title,
							 'skills' => $skills,
				              'city_id' => $city_id,
							  'state_id' => $state_id,
				              'category_id' => $category_id,
				              'type_id' => $type_id,
				              'description' => $description,
							  'location_outside_ro_where' => ($isCitySelected ? '' : $location_outside_ro_where) ,
				              'apply' => '',
				              'poster_email' => $poster_email,
							  'salary' => $salary,
					          'salary_thousands'=>$salary_thousands,
							  'minexp' => $minexp,
							  'maxexp' => $maxexp,
							  'industry' => $industry,
							  'functional_area' => $area,
							 'qualification' => $qualification,
							 'apply_online' => $apply_online);
				
				if ($job_id != 0)
				{
					$job->Edit($data);
				}
				else
				{
					// a job posted by the admin is active from the beginning
					$data['is_temp'] = 0;
					$data['is_active'] = 1;
					$data['spotlight'] = 0;
					
					$job->Create($data);
				}
				
				$category = get_category_by_id($category_id);
				
				redirect_to(BASE_URL . URL_JOBS . '/' . $category['var_name'] . '/');
				exit;
			}
		}
		else
			$smarty->assign('errors', $errors);
	}
		
	$smarty->assign('categories', get_categories());
	$smarty->assign('types', get_types());
	$smarty->assign('cities', get_cities());
	$smarty->assign('year' , get_years());
	$smarty->assign('salary', get_salary());
	$smarty->assign('states', get_states());
	$smarty->assign('salary_thousands',get_salary_thousands());
	$smarty->assign('qualification' , get_qualification());
	$smarty->assign('industries',get_industries());
	$smarty->assign('jobslist', jobs_list());
	
	$html_title = $translations['jobs']['title_edit'] . ' / ' . SITE_NAME;
	
	$template = 'edit-post.tpl';
?>