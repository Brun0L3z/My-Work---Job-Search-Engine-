<?php

 
	$city_array = get_cities_cloud();
	$smarty->assign('cities_overview', $city_array);
	
	$numberOfJobsInOtherCities = $job->GetNumberOfJobsInOtherCities();
	$smarty->assign('jobs_count_in_other_cities', $numberOfJobsInOtherCities);
	$smarty->assign('jobs_count_in_other_cities_tag_height', get_cloud_tag_height($numberOfJobsInOtherCities));
	
	$totalNumberOfJobs = 0;
	
	foreach ($city_array as $city_job_data)
	{
		$totalNumberOfJobs += $city_job_data['count'];
	}
	
	$totalNumberOfJobs += $numberOfJobsInOtherCities;
	
	$smarty->assign('total_number_of_jobs', $totalNumberOfJobs);
	
	$html_title = $translations['jobscity']['page_title'];
	$template = 'cities.tpl';
?>