<?php

// a user's visit on a job post is only counted once per hour
define('MAX_VISITS_PER_HOUR', 1);
error_reporting(E_ALL ^ E_NOTICE);
class Job
{
	var $mId = false;
	//var $mTypeId = false;
	var $mTypeVarName = false;
	var $mTypeName = false;
	var $mCategoryId = false;
	var $mTitle = false;
	var $mDescription = false;
	var $mSkills = false;
	var $mCompany = false;
	var $mLocation = false;
	var $mUrl = false;
	var $mApply = false;
	var $mCreatedOn = false;
	var $mIsTemp = false;
	var $mIsActive = false;
	var $mViewsCount = false;
	var $mAuth = false;
	var $mCityId = false;
	var $mStateId = false;
	var $mLocationOutsideRo = false;
	var $mPosterEmail = false;
	var $mUrlTitle = false;
	var $mApplyOnline = false;
	var $mCategoryName = false;
	var	$mClosedOn = false;
	var	$mDaysOld = false;
	var $mIsSpotlight = false;
	var $mMySqlDate = false;
	var $mSalary = false;
	var $mMaxExp = false;
	var $mMinExp = false;
	var $mArea = false;
	var $mFunctionalAreaName = false;
	var $mIndustry = false;
	var $mQualification = false;
	
	function __construct($job_id = false)
	{
		global $db;
		if (is_numeric($job_id))
		{
			$sanitizer = new Sanitizer;
			 $sql = 'SELECT a.category_id AS category_id, a.title AS title, a.description AS description, a.skills AS skills,
                            a.company AS company, a.url AS url, a.apply AS apply, 
			               DATE_FORMAT(a.created_on, "' . DATE_FORMAT . '") AS created_on, a.created_on AS mysql_date,
			               a.is_temp AS is_temp, a.is_active AS is_active, a.spotlight AS spotlight,
						   a.salary AS salary, a.minexp AS minexp , a.maxexp AS maxexp,a.industry AS industry, a.functional_area AS functional_area, a.qualification AS qualification,
			               a.views_count AS views_count, a.auth AS auth, a.city_id AS city_id, a.state_id AS state_id,a.outside_location AS outside_location,
			               a.poster_email AS poster_email, a.apply_online AS apply_online, b.name AS category_name,
			               c.var_name as type_var_name, c.name as type_name,
			               DATE_ADD(created_on, INTERVAL 30 DAY) AS closed_on, DATEDIFF(NOW(), created_on) AS days_old, cit.name AS city_name
			               FROM '.DB_PREFIX.'jobs a LEFT JOIN '.DB_PREFIX.'cities cit on a.city_id = cit.id, '.DB_PREFIX.'categories b, '.DB_PREFIX.'types c
			               WHERE a.category_id = b.id   AND a.id = ' . $job_id;
			
			$result = $db->query($sql);
			$row = $result->fetch_assoc();
			
			if (!empty($row))
			{
				$this->mId = $job_id;
				$this->mTypeId = $row['type_id'];
				$this->mCategoryId = $row['category_id'];
				$this->mCategoryName = $row['category_name'];
				$this->mTitle = str_replace('&', '&amp;', $row['title']);
				$this->mDescription = $row['description'];
				$this->mSkills = $row['skills'];
				$this->mCompany = $row['company'];
				$this->mUrl = $row['url'];
				$this->mApply = $row['apply'];
				$this->mCreatedOn = $row['created_on'];
				$this->mClosedOn = $row['closed_on'];
				$this->mIsTemp = $row['is_temp'];
				$this->mIsActive = $row['is_active'];
				$this->mViewsCount = $row['views_count'];
				$this->mAuth = $row['auth'];
				$this->mCityId = $row['city_id'];
				$this->mStateId = $row['state_id'];
				$this->mMySqlDate = $row['mysql_date'];
				$this->mLocation = $this->GetLocation($row);
				$this->mLocationOutsideRo = $row['outside_location'];
				$this->mPosterEmail = $row['poster_email'];
				$this->mUrlTitle = $sanitizer->sanitize_title_with_dashes($this->mTitle . ' at ' . $this->mCompany);
				$this->mApplyOnline = $row['apply_online'];
				$this->mDaysOld = $row['days_old'];
				$this->mIsSpotlight = $row['spotlight'];
				$this->mSalary= $row['salary'];
				$this->mMinExp = $row['minexp'];
				$this->mMaxExp = $row['maxexp'];
				$this->mIndustry=$row['industry'];
				$this->mArea = $row['functional_area'];
				//$this->mFunctionAreaName = $this->GetFunctionalAreaName($row);
				$this->mQualification = $row['qualification'];
				$this->mTypeName = $row['type_name'];
				$this->mTypeVarName = $row['type_var_name'];
			}
		}
	}
	
	// Get a job post's information
	public function GetInfo()
	{
		$job = array('id' => $this->mId,
		             'type_id' => $this->mTypeId,
		             'category_id' => $this->mCategoryId,
		             'category_name' => $this->mCategoryName,
					 'skills' => $this->mSkills,
					 'company' => stripslashes($this->mCompany),
					 'url' => stripslashes($this->mUrl),
					 'title' => stripslashes($this->mTitle),
					 'url_title' => stripslashes($this->mUrlTitle),
					 'location' => $this->mLocation,
					 'location_outside_ro' => $this->mLocationOutsideRo,
					 'is_location_anywhere' => $this->IsLocationAnywhere(),
					 'description' => stripslashes($this->mDescription),
					 'created_on' => stripslashes($this->mCreatedOn),
					 'closed_on' => stripslashes($this->mClosedOn),
					 'apply' => stripslashes($this->mApply),
					 'views_count' => $this->mViewsCount,
					 'auth' => $this->mAuth,
					 'city_id' => $this->mCityId,
					 'state_id' => $this->mStateId,
					 'mysql_date' => $this->mMySqlDate,
					 'poster_email' => $this->mPosterEmail,
					 'apply_online' => $this->mApplyOnline,
					 'is_active' => $this->mIsActive,
					 'days_old' => $this->mDaysOld,
			         'salary' => $this->mSalary,
					'minexp'=>$this->mMinExp,
					'maxexp'=>$this->mMaxExp,
					'industry' => $this->mIndustry,
					'functional_area' => $this->mArea,
					'qualification' => $this->mQualification,
					 'is_spotlight' => $this->mIsSpotlight,
					 'type_name' => $this->mTypeName,
					 'type_var_name' => $this->mTypeVarName);
		
		return $job;
	}
	
	// Get a job post's basic information for admin
	public function GetBasicInfoAdmin()
	{
		$job = array('id' => $this->mId,
			         'type_id' => $this->mTypeId,
			         'category_id' => $this->mCategoryId,
 			         'category_name' => $this->mCategoryName,
					 'skills' => $this->mSkills,
					 'company' => stripslashes($this->mCompany),
					 'url' => stripslashes($this->mUrl),
					 'title' => stripslashes($this->mTitle),
					 'url_title' => stripslashes($this->mUrlTitle),
					 'location' => $this->mLocation,
					 'location_outside_ro' => $this->mLocationOutsideRo,
					 'is_location_anywhere' => $this->IsLocationAnywhere(),
					 'description' => stripslashes($this->mDescription),
					 'created_on' => stripslashes($this->mCreatedOn),
					 'closed_on' => stripslashes($this->mClosedOn),
					 'apply' => stripslashes($this->mApply),
					 'city_id' => $this->mCityId,
					 'state_id' => $this->mStateId,
					 'mysql_date' => $this->mMySqlDate,
					 'days_old' => $this->mDaysOld,
					 'is_active' => $this->mIsActive,
					 'views_count' => $this->mViewsCount,
					'salary' => $this->mSalary,
					'minexp'=>$this->mMinExp,
					'maxexp'=>$this->mMaxExp,
					'industry' => $this->mIndustry,
					'functional_area' => $this->mArea,
					//'functionalareaname' => $this->mFunctionalAreaName,
					'qualification' => $this->mQualification,
					 'is_spotlight' => $this->mIsSpotlight,
					 'type_name' => $this->mTypeName,
					 'type_var_name' => $this->mTypeVarName);
		
		return $job;
	}
	
	private function GetLocation($resultSetRow)
	{
		$location = '';
		
		if ($resultSetRow['city_id'] != NULL) 
		{
			$location = $resultSetRow['city_name'];
		}	
		elseif ($resultSetRow['outside_location'] != '')
		{
			$location = $resultSetRow['outside_location'];
		}
		
		return $location;
	}
	


	/* Functional Area Name displayed
	private function GetFunctionalAreaName($row)
	{
		$functionalareaname = '';
		$list = jobs_list();
		foreach($list as $array){
		foreach($array as $name=>$value){
			if($array['id'] == $row['functional_area'])
			{
				 $functionalareaname=$array['name'];
			}
		}
	 }

		return $functionalareaname;
		
	}*/
	
	/**/
	private function IsLocationAnywhere()
	{
		return $this->mCityId == 0 && $this->mLocationOutsideRo == '';
	}
	
	// Get all job posts (optionally from a specific type and/or category)
	// $type_id: freelance/fulltime/parttime
	// $categ_id: programatori/designeri/etc.
	// $limit: (int) how many results
	// $random: (1/0) randomize results?
	// $days_behind: (int) only get results from last N days
	// $for_feed: (boolean) is this request from rss feed?
	public function GetJobs( $categ_id = false, $limit = false, $random, $days_behind, $for_feed = false, $city_id = false, $type_id = false, $spotlight = false)
	{
		global $db;
		$jobs = array();
		$conditions = '';
		
		// if $categ_id is, in fact, the category's var_name, 
		// get the categs id
		if (!is_numeric($categ_id))
		{
			$categ_id = $this->GetCategId($categ_id);
		}
		// if $type_id is, in fact, the type's var_name, 
		// get the type's id
		/*if (!is_numeric($type_id))
		{
			$type_id = $this->GetTypeId($type_id);
		}*/
		
		
		if (is_numeric($categ_id) && $categ_id != 0)
		{
			$conditions .= ' AND category_id = ' . $categ_id;
		}
		
		if ($days_behind > 0)
		{
			$conditions .=' AND created_on >= DATE_SUB(NOW(), INTERVAL ' . $days_behind . ' DAY)';
		}
		
		if ($for_feed)
		{
			// job was posted more than 10 minutes ago
			$conditions .= ' AND DATE_SUB(NOW(), INTERVAL 10 MINUTE) > created_on';
		}
		
		if ($city_id && is_numeric($city_id))
		{
			$conditions .= ' AND city_id = ' . $city_id;
		}
		
		if ($type_id && is_numeric($type_id))
		{
			$conditions .= ' AND type_id = ' . $type_id;
		}
		
		if ($spotlight &&  is_numeric($spotlight))
    	{
  			$conditions .= ' AND spotlight = ' . $spotlight;
		}

		if ($random == 1)
		{
			$order = ' ORDER BY RAND() ';
		}
		else
		{
			$order = ' ORDER BY created_on DESC ';
		}
		
		if ($limit != false && $limit > 0)
		{
			$sql_limit = 'LIMIT ' . $limit;
		}
		else
		{
			$sql_limit = '';
		}
		
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'jobs
		               WHERE 1 ' . $conditions . ' AND is_temp = 0 AND is_active = 1
		               ' . $order . ' ' . $sql_limit;
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetInfo();
		}
		return $jobs;
	}
	
	public function GetPaginatedJobsForCategory($categoryID, $startIndex, $numberOfJobsToGet, $jobTypeID)
	{
		global $db;
		$jobs = array();
		
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'jobs
		               WHERE category_id = ' . $categoryID . ' AND is_temp = 0 AND is_active = 1';
		
		/*if ($jobTypeID != 0)
		{
			$sql .= ' AND type_id = ' . $jobTypeID;
		}*/
		
		$sql .= ' ORDER BY created_on DESC limit ' . $startIndex . ',' . $numberOfJobsToGet;
		
		$result = $db->query($sql);
		
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetInfo();
		}
		
		return $jobs;
	}
	
	public function GetPaginatedJobsForCity($cityID, $startIndex, $numberOfJobsToGet, $jobTypeID = null)
	{
		global $db;
		$jobs = array();
		
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'jobs
		               WHERE city_id = ' . $cityID . ' AND is_temp = 0 AND is_active = 1';
		
		if ($jobTypeID != 0)
		{
			$sql .= ' AND type_id = ' . $jobTypeID;
		}
		
		$sql .= ' ORDER BY created_on DESC limit ' . $startIndex . ',' . $numberOfJobsToGet;
		
		$result = $db->query($sql);
		
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetInfo();
		}
		
		return $jobs;
	}
	
	public function GetPaginatedJobs($startIndex, $numberOfJobsToGet, $jobTypeID = 0)
	{
		global $db;
		$jobs = array();
		
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'jobs
		               WHERE is_temp = 0 AND is_active = 1';
		
		if ($jobTypeID != 0)
		{
			$sql .= ' AND type_id = ' . $jobTypeID;
		}
		
		$sql .= ' ORDER BY created_on DESC limit ' . $startIndex . ',' . $numberOfJobsToGet;
		
		$result = $db->query($sql);
		
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetInfo();
		}
		
		return $jobs;
	}
	
	//Get all inactive jobs for admin 
	public function GetInactiveJobs($offset, $rowCount)
	{
		global $db;
		$jobs = array();
		
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'jobs
		               WHERE 1 AND is_temp = 0 AND is_active = 0
		               ORDER BY created_on DESC LIMIT ' . $offset .' , ' . $rowCount;
		
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetBasicInfoAdmin();
		}
		return $jobs;
	}
	
	public function getInactiveJobCount()
	{
		global $db;
		$sql = 'SELECT COUNT(id) AS total FROM '.DB_PREFIX.'jobs WHERE is_temp = 0 AND is_active = 0';
	
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['total'];	
	}
	
	//Get all inactive/active jobs for a specific category for admin
	// $type_id: freelance/fulltime/parttime
	// $categ_id: programatori/designeri/etc.
	// $limit: (int) how many results
	public function GetAllForCategoryJobsAdmin($type_id, $categ_id = false, $limit = false)
	{
		global $db;
		$jobs = array();
		$conditions = '';
		
		// if $categ_id is, in fact, the category's var_name, 
		// get the categs id
		if (!is_numeric($categ_id))
		{
			$categ_id = $this->GetCategId($categ_id);
		}
		// if $type_id is, in fact, the type's var_name, 
		// get the type's id
		if (!is_numeric($type_id))
		{
			$type_id = $this->GetTypeId($type_id);
		}
		
		if (is_numeric($type_id) && $type_id != 0)
		{
			$conditions .= ' AND type_id = ' . $type_id;
		}
		if (is_numeric($categ_id) && $categ_id != 0)
		{
			$conditions .= ' AND category_id = ' . $categ_id;
		}

		if ($type_id && is_numeric($type_id))
		{
			$conditions .= ' AND type_id = ' . $type_id;
		}

		$sql_limit = 'LIMIT ' . $limit;
			
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'jobs
		               WHERE 1 ' . $conditions . ' AND is_temp = 0 
		               ' . $sql_limit;
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetBasicInfoAdmin();
		}
		return $jobs;
	}
	
	
	// get jobs for API
	public function ApiGetJobs($type_id = false, $categ_id = false, $limit = false, $random, $days_behind, $for_feed = false, $city_id = false)
	{
		global $db;
		
		$jobs = array();
		$conditions = '';
		
		// if $categ_id is, in fact, the category's var_name, 
		// get the categs id
		if (!is_numeric($categ_id))
		{
			$categ_id = $this->GetCategId($categ_id);
		}
		// if $type_id is, in fact, the type's var_name, 
		// get the type's id
		if (!is_numeric($type_id))
		{
			$type_id = $this->GetTypeId($type_id);
		}
		
		if (is_numeric($type_id) && $type_id != 0)
		{
			$conditions .= ' AND type_id = ' . $type_id;
		}
		if (is_numeric($categ_id) && $categ_id != 0)
		{
			$conditions .= ' AND category_id = ' . $categ_id;
		}
		
		if ($days_behind > 0)
		{
			$conditions .=' AND created_on >= DATE_SUB(NOW(), INTERVAL ' . $days_behind . ' DAY)';
		}
		
		if ($for_feed)
		{
			// job was posted more than 10 minutes ago
			$conditions .= ' AND DATE_SUB(NOW(), INTERVAL 10 MINUTE) > created_on';
		}
		
		if ($city_id && is_numeric($city_id))
		{
			$conditions .= ' AND city_id = ' . $city_id;
		}

		if ($random == 1)
		{
			$order = ' ORDER BY RAND() ';
		}
		else
		{
			$order = ' ORDER BY created_on DESC ';
		}

		if($limit > 0)
			$sql_limit = 'LIMIT ' . $limit;
		else
			$sql_limit = '';
		
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'jobs
		               WHERE 1 ' . $conditions . ' AND is_temp = 0 AND is_active = 1  AND created_on > DATE_SUB(NOW(), INTERVAL 31 DAY)
		               ' . $order . ' ' . $sql_limit;
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$job = $current_job->GetInfo();
			unset($job['poster_email']);
			unset($job['auth']);
			$jobs[] = $job;
		}
		return $jobs;
	}

	// Get all jobs published by a company
	public function ApiGetJobsByCompany($company = false, $limit = false, $for_feed = false)
	{
		global $db;
		
		$jobs = array();
		$conditions = '';
		
		if ($company)
		{
			$conditions .= ' AND company LIKE "' . $db->real_escape_string($company) . '"';
		}
		
		if ($for_feed)
		{
			// job was posted more than 10 minutes ago
			$conditions .= ' AND DATE_SUB(NOW(), INTERVAL 10 MINUTE) > created_on';
		}
		
		if($limit > 0)
			$sql_limit = 'LIMIT ' . $limit;
		else
			$sql_limit = '';
		
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'jobs
		               WHERE 1 ' . $conditions . ' AND is_temp = 0 AND is_active = 1
		               ORDER BY created_on DESC ' . $sql_limit;
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$job = $current_job->GetInfo();
			unset($job['poster_email']);
			unset($job['auth']);
			$jobs[] = $job;
		}
		return $jobs;
	}
	
	public function GetMostAppliedToJobs($limit = false)
	{
		global $db;
		
		$jobs = array();
		
		$sql_limit = 'LIMIT ' . $limit;
					
		$i = 0;
		$sql = 'SELECT ja.job_id, COUNT(ja.id) as nr FROM '.DB_PREFIX.'job_applications ja, '.DB_PREFIX.'jobs jbs WHERE ja.job_id = jbs.id 
		               and jbs.is_temp = 0 AND jbs.is_active = 1 GROUP BY ja.job_id ORDER BY nr DESC ' . $sql_limit;
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['job_id']);
			$jobs[$i] = $current_job->GetInfo();
			$jobs[$i]['apps'] = $row['nr'];
			$i++;
		}
		return $jobs;
	}
//function to get jobsapplyed by user
public function jobsapplyed()
{
	global $db;
	$jobs = array();
	$userid=$_SESSION['UserId'] ;
	  $sql='SELECT job_id
FROM '.DB_PREFIX.' jobs
INNER JOIN job_applications ON jobs.id = job_applications.`job_id` WHERE user_id="'.$userid.'"'; 
	$result = $db->query($sql);
	while ($row = $result->fetch_assoc())
	{
		$current_job = new Job($row['job_id']);
			$jobs[$i] = $current_job->GetInfo();
			$jobs[$i]['apps'] = $row['nr'];
			$i++;
			
	}
	return $jobs;
}
/* jobs as per User skills  starts*/
public function skilljobs($skills_name)
{
	global $db;
	$jobs = array();
	$url=$_SERVER['QUERY_STRING'];
	parse_str($url);
	$sql='SELECT *	FROM '.DB_PREFIX.' jobs
	 WHERE skills LIKE "%' . $skills_name . '%"';  

	$result = $db->query($sql);
	while ($row = $result->fetch_assoc())
	{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetInfo();
			
	}
	return $jobs;
}
  /* jobs as per User skills ends */
	// Search for jobs
	public function Search($keywords, $url_query, $start_page = 1)
	{
		global $db;
		$jobs = array();
		$conditions = '';
		$url="&url_query=".$url_query."&keywords=".$keywords;
		$_SESSION['keywords_array'] = array();
 
		if (SEARCH_METHOD == 'classic')
		{
			$kw1 = $kw2 = $extra_conditions = '';
			$found_city = false;
			
			if (strstr($keywords, ',') || strstr($keywords, ', '))
			{
				$tmp = explode(',', $keywords);
				$kw1 = trim($tmp[0]);
				$kw2 = trim($tmp[1]);
				if ($kw1 == '')
				{
					$kw1 = $kw2;
					$kw2 = '';
				}
			}
			else if (strstr($keywords, ' ') || strstr($keywords, '  '))
			{
				// filter out empty strings (can happen if there are many whitespaces between two words in the search string)
				$tmp = array_filter(explode(' ', $keywords));
				foreach ($tmp as $word)
				{
					// try to find city based on city_id
					$sql = 'SELECT id FROM '.DB_PREFIX.'cities WHERE name LIKE "%' . $word . '%"';
					$result = $db->query($sql);
					$row = $result->fetch_assoc();
					if ($row['id'] != '')
					{
						if ($found_city)
						{
							$conditions .= ' OR';
						}
 
						$conditions .= ' city_id = ' . $row['id'];
						$found_city = true;
						$keywords = trim(str_replace($word, '', $keywords));
					}
 
					// try to find city based on postcode or location_details
					$sql = 'SELECT id FROM '.DB_PREFIX.'jobs WHERE outside_location LIKE "%' . $word . '%"';
					$results = $db->QueryArray($sql);
					if ($db->affected_rows > 0)
					{
						if ($found_city)
						{
							$conditions .= ' OR ';
						}
						$conditions .= ' id IN (';
						foreach ($results as $j)
						{
							$conditions .= $j['id'] . ',';
							$found_city = true;
						}	
						$conditions = rtrim($conditions, ',');
						$conditions .= ') ';
						$keywords = trim(str_replace($word, '', $keywords));
					}
				}
				if ($found_city)
				{
					$conditions .= ' AND (title LIKE "%' . $keywords . '%" OR company LIKE "%' . $keywords . '%"' .  ' OR description LIKE "%' . $keywords . '%")';	
				}
			}
 
			if (!$found_city)
			{
				if ($kw1 != '')
				{
					$conditions .= ' (title LIKE "%' . $kw1 . '%" OR description LIKE "%' . $kw1 . '%")';
					$_SESSION['keywords_array'][] = $kw1;
				}
				if ($kw2 != '')
				{
					$sql = 'SELECT id FROM '.DB_PREFIX.'cities WHERE name LIKE "%' . $kw2 . '%"';
					$result = $db->query($sql);
					$row = $result->fetch_assoc();
					if ($row['id'] != '')
					{
						$extra_conditions .= ' OR city_id = ' . $row['id'];
					}
					$conditions .= ' AND (outside_location LIKE "%' . $kw2 . '%" ' . $extra_conditions . ')';
					$_SESSION['keywords_array'][] = $kw2;
				}
				if ($kw1 == '' && $kw2 == '')
				{
					$sql = 'SELECT id FROM '.DB_PREFIX.'cities WHERE name LIKE "%' . $keywords . '%"';
					$result = $db->query($sql);
					$row = $result->fetch_assoc();
					if ($row['id'] != '')
					{
						$extra_conditions .= ' OR city_id = ' . $row['id'];
					}
					$conditions = 'title LIKE "%' . $keywords . '%" OR company LIKE "%' . $keywords . '%"' .  ' OR description LIKE "%' . $keywords . '%" OR outside_location LIKE "%' . $keywords . '%"' . $extra_conditions;
 
					$_SESSION['keywords_array'][] = $keywords;
				}
			}
 
			$sql = 'SELECT id
		               FROM '.DB_PREFIX.'jobs
		               WHERE is_temp = 0 AND is_active = 1 AND (' . $conditions . ')
		               ORDER BY created_on DESC';
			
			$result = $db->query($sql);
			$rows = $db->QueryNumRows($sql);
			if (!empty($rows))
			{
				$this->rows = $rows; 
			}

		}
		else
		{
			$cities = array();
			$check_cities = '';
 
		    $keywords = str_replace(","," ", $keywords);
		    $keywords = str_replace("  "," ", $keywords);
		    $keywords = rtrim($keywords);
 
		    $keywords_a = preg_split( "/[\s,]*\\'([^\\\"]+)\\'[\s,]*|[\s,]+/", $keywords, 0, PREG_SPLIT_DELIM_CAPTURE );
		    function array_trim($a) { $j = 0; for ($i = 0; $i < count($a); $i++) { if ($a[$i] != "") { $b[$j++] = $a[$i]; } } return $b; }
		    $keywords_r = array_trim($keywords_a);
 
		    //Search in Cities
		    for ($i=0; $i < count($keywords_r); $i++)
		    {
		      $sql = 'SELECT id
		                     FROM '.DB_PREFIX.'cities
		                     WHERE name LIKE "%'. $keywords_r[$i] .'%"
		                     ORDER BY ID ASC';
		      $result = $db->query($sql);
		      $cities_line = '';
 
		      while ($row = $result->fetch_assoc())
		      {
		        $cities_line .= $row['id'].' ';
		      }
		      $cities[$i] = $cities_line;
		    }
 
		    //Search in Jobs
		    for ($i=0; $i < count($keywords_r); $i++)
		    {
		        if ($cities[$i] != "") {
		          $cities[$i] = rtrim($cities[$i]);
		          $cities_r = explode(' ', $cities[$i]);
 
		          for ($a=0; $a < count($cities_r); $a++)
		          {
		            $check_cities .= 'OR city_id = "'.$cities_r[$a].'" ';
		          }
		        }
		        $conditions .= 'AND (title LIKE "%' . $keywords_r[$i] . '%" OR description LIKE "%' . $keywords_r[$i] . '%" OR outside_location LIKE "%' . $keywords_r[$i] . '%" '.$check_cities.' ) ';
		    }
 
			$sql = 'SELECT id
					FROM '.DB_PREFIX.'jobs
					WHERE is_temp = 0 AND is_active = 1 '. $conditions .'
					ORDER BY created_on DESC';
				 $rows = $db->QueryNumRows($sql);
		
		 $result = $db->query($sql);
			if (!empty($rows))
			{
				$this->rows = $rows; 
			}
			
		}
 
		$pages = '';
		$id_array = '';
		$max_loop = SEARCH_RESULTS_PER_PAGE;
		$max_visible_pages = SEARCH_AMOUNT_PAGES;
 
		while ($row = $result->fetch_assoc()) $id_array[] = $row['id'];
 
		$start_count = (($start_page - 1) * $max_loop) ;
		$current_loop = 0;
 
		$total_results = count($id_array);
		$total_loop = ($total_results ) - $start_count;
 
		$total_pages = ceil($total_results / $max_loop);
 
		if ($total_pages > 1)
		{
 
			$pagination_loop = $start_page - ($max_visible_pages / 2);
 
			if ($pagination_loop < 1) $pagination_loop = 1;
			elseif (($pagination_loop - 1) > 0) $pages .= "&nbsp;<a href='".BASE_URL."search/?p=".($pagination_loop - 1).$url."'>&laquo;</a>&nbsp;";
 
			$pagination_top = $pagination_loop + $max_visible_pages + 1;
 
			while (($pagination_loop < ($total_pages+1)) && ($pagination_loop < $pagination_top))
			{
				if ($pagination_loop == $start_page) $pages .= "&nbsp;<a class='current_page' href='".BASE_URL."search/?p=$pagination_loop".$url."'>$pagination_loop</a>&nbsp;";
				else $pages .= "&nbsp;<a href='".BASE_URL."search/?p=$pagination_loop".$url."'>$pagination_loop</a>&nbsp;";
				$pagination_loop++;	
			}
 
			if ($pagination_loop == $pagination_top) $pages .= "&nbsp;<a href='".BASE_URL."search/?p=".($pagination_loop).$url."'>&raquo;</a>&nbsp;";
 
		}
 
		if ($id_array != '')
		{
			while (($current_loop < $total_loop) && ($current_loop < ($max_loop )))
			{
				$current_job = new Job($id_array[$start_count]);
				$jobs[] = $current_job->GetInfo();
				$current_loop++;
				$start_count++;
			}
		}
 
		$_SESSION['search_results'] = $jobs;
		$_SESSION['search_pagination'] = $pages;
		return $jobs;
	}
	/* Search Records closed */

/*Advance Search */
public function AdvanceSearch($advance_keywords=null, $title_skills=null , $minexp=null,$maxexp=null ,$minsalary=null , $maxsalary=null ,$area=null,$industry= null, $start_page =1)
	{
		global $db;
		$jobs = array();
		$advance_keywords=ucfirst($advance_keywords);
		$con='';
		$conditions = '';
		$_SESSION['advancesearch_keywords_array'] = array();
 		if (SEARCH_METHOD == 'classic')
		{
		  $found_city = false;
			$con .='&title_skills='.$title_skills;
			if (strstr($title_skills, ',') || strstr($title_skills, ', '))
			{
					$tmp = explode(',', $title_skills);
					 $title = trim($tmp[0]);
					 $skills = trim($tmp[1]);
				if ($title == '')
				{
					$title = $skills;
					$skills = '';
				}
				if ($title != '')
				{
					
					 $conditions .=' and title LIKE "%' . $title  . '%"';
					
				}
				if($skills != '')
				{
					
					$conditions .=' and skills LIKE "%' . $skills  . '%"';
				}
				
			}
			else{
				$con .='&title_skills='.$title_skills;
				$conditions .=' and title LIKE "%' . $title_skills  . '%"';
			}

		  if($advance_keywords != null){
			  $con .='&advance_keywords='.$advance_keywords;
			  $sql = 'SELECT id FROM '.DB_PREFIX.'cities WHERE name LIKE "%' . $advance_keywords . '%"';
			  $result = $db->query($sql);
			  $row = $result->fetch_assoc();
			  if ($row['id'] != '')
				{
				$conditions .= ' and city_id = ' . $row['id'];
				
				}
			else{
				// try to find city based on postcode or location_details
				$conditions .=' and outside_location LIKE "%' . $advance_keywords  . '%"';
				
				}
		  }
		// maxexp and minexp
		 
		if($maxexp == null && $minexp != null){
			 $con .='&minexp='.$minexp;
			 $conditions .= ' and minexp >= '.$minexp;
		 }
		 if($maxexp != null && $minexp == null){
			 $con .='&maxexp='.$maxexp;
			 $conditions .= ' and maxexp <= '.$maxexp;
		  }
		 if($maxexp != null && $minexp != null){
			  $con .='&minexp='.$minexp.'&maxexp='.$maxexp;
			 $conditions .= ' And (maxexp <= ' .$maxexp.' And minexp >='.$minexp.')'; 		
		}
		//Salary
		 if($maxsalary != null && $minsalary == null){
			  $con .='&maxsalary='.$maxsalary;
			 $conditions .= ' and salary <= '.$maxsalary;
		 }
		if($maxsalary == null && $minsalary != null){
			 $con .='&minsalary='.$minsalary;
			 $conditions .= ' and salary >= '.$minsalary;
		 }
		 if($maxsalary != null && $minsalary != null){
			  $con .='&minsalary='.$minsalary.'&maxsalary='.$maxsalary;
			 $conditions .= ' And (salary <= ' .$maxsalary.' And salary >='.$minsalary.')'; 		
		}
		
		
		if($area != null){
			 $con .='&area='.$area;
			$conditions .= ' and functional_area = '. $area;
		}
		if($industry != null){
			 $con .='&industry='.$industry;
			$conditions .=' and industry = '.$industry;
		}
		
		 $sql = 'SELECT id
		               FROM '.DB_PREFIX.'jobs
		               WHERE is_temp = 0 AND is_active = 1   ' . $conditions . '
		               ORDER BY created_on DESC';
		 $rows = $db->QueryNumRows($sql);
		
		 $result = $db->query($sql);
			if (!empty($rows))
			{
				$this->rows = $rows; 
			}
		}
 
			
		
		/*else
		{
			$cities = array();
			$check_cities = '';
 
		    $advance_keywords = str_replace(","," ", $advance_keywords);
		    $advance_keywords = str_replace("  "," ", $advance_keywords);
		    $advance_keywords = rtrim($advance_keywords);
 
		    $keywords_a = preg_split( "/[\s,]*\\'([^\\\"]+)\\'[\s,]*|[\s,]+/", $advance_keywords, 0, PREG_SPLIT_DELIM_CAPTURE );
		    function array_trim($a) { $j = 0; for ($i = 0; $i < count($a); $i++) { if ($a[$i] != "") { $b[$j++] = $a[$i]; } } return $b; }
		    $keywords_r = array_trim($keywords_a);
 
		    //Search in Cities
		    for ($i=0; $i < count($keywords_r); $i++)
		    {
				echo "else condition";
		      echo $sql = 'SELECT id
		                     FROM '.DB_PREFIX.'cities
		                     WHERE name LIKE "%'. $keywords_r[$i] .'%"
		                     ORDER BY ID ASC';
							 exit;
		      $result = $db->query($sql);
		      $cities_line = '';
 
		      while ($row = $result->fetch_assoc())
		      {
		        $cities_line .= $row['id'].' ';
		      }
		      $cities[$i] = $cities_line;
		    }
 
		    //Search in Jobs
		    for ($i=0; $i < count($keywords_r); $i++)
		    {
		        if ($cities[$i] != "") {
		          $cities[$i] = rtrim($cities[$i]);
		          $cities_r = explode(' ', $cities[$i]);
 
		          for ($a=0; $a < count($cities_r); $a++)
		          {
		            $check_cities .= 'OR city_id = "'.$cities_r[$a].'" ';
		          }
		        }
		        $conditions .= 'AND (title LIKE "%' . $keywords_r[$i] . '%" OR description LIKE "%' . $keywords_r[$i] . '%" OR outside_location LIKE "%' . $keywords_r[$i] . '%" '.$check_cities.' ) ';
		    }
 
			$sql = 'SELECT id
					FROM '.DB_PREFIX.'jobs
					WHERE is_temp = 0 AND is_active = 1 '. $conditions .'
					ORDER BY created_on DESC';
			$result = $db->query($sql);			
		}*/
 
		$pages = '';
		$id_array = '';
		$max_loop = SEARCH_RESULTS_PER_PAGE;
		$max_visible_pages = SEARCH_AMOUNT_PAGES;
 
		while ($row = $result->fetch_assoc()) $id_array[] = $row['id'];
		$start_count = (($start_page - 1) * $max_loop) ;
		$current_loop = 0;
 
		$total_results = count($id_array);
		$total_loop = ($total_results ) - $start_count;
 
		$total_pages = ceil($total_results / $max_loop);
 
		if ($total_pages > 1)
		{
 
			$pagination_loop = $start_page - ($max_visible_pages / 2);
 
			if ($pagination_loop < 1) $pagination_loop = 1;
			elseif (($pagination_loop - 1) > 0) $pages .= "&nbsp;<a href='".BASE_URL."job_search/?p=".($pagination_loop - 1).$con."'>&laquo;</a>&nbsp;";
 
			$pagination_top = $pagination_loop + $max_visible_pages + 1;
 
			while (($pagination_loop < ($total_pages+1)) && ($pagination_loop < $pagination_top))
			{
				if ($pagination_loop == $start_page) $pages .= "&nbsp;<a class='current_page' href='".BASE_URL."job_search/?p=$pagination_loop".$con."'>$pagination_loop</a>&nbsp;";
				else $pages .= "&nbsp;<a href='".BASE_URL."job_search/?p=$pagination_loop".$con."'>$pagination_loop</a>&nbsp;";
				$pagination_loop++;	
			}
 
			if ($pagination_loop == $pagination_top) $pages .= "&nbsp;<a href='".BASE_URL."job_search/?p=".($pagination_loop).$con."'>&raquo;</a>&nbsp;";
 
		}
 
		if ($id_array != '')
		{
			while (($current_loop < $total_loop) && ($current_loop < ($max_loop )))
			{
				$current_job = new Job($id_array[$start_count]);
				$jobs[] = $current_job->GetInfo();
				$current_loop++;
				$start_count++;
			}
		}
 
			$_SESSION['search_results'] = $jobs;
			$_SESSION['search_pagination'] = $pages;
		return $jobs;
		
	}
	/* Advance Search Records closed */
	/*Num Of Rows Function */
	public function getRows()
 	{
 		return $this->rows;
 	}
/*Num OF Rows Function*/




	public function GetCategId($var_name)
	{
		global $db;
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'categories
		               WHERE var_name = "' . $var_name . '"';
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['id'];
	}
	
	public function GetTypeId($var_name)
	{
		global $db;
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'types
		               WHERE var_name = "' . $var_name . '"';
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['id'];
	}
	
	public function GetTempStatus()
	{
		return $this->mIsTemp;
	}
	
	public function GetActiveStatus()
	{
		return $this->mIsActive;
	}
	
	public function GetAuth()
	{
		return $this->mAuth;
	}
	
	public function IncreaseViewCount()
	{
		global $db;
		// check if user has hit this page in the past hour
		$ip = $_SERVER['REMOTE_ADDR'];
    //extract number of hits on last hour
    $sql = 'SELECT count(*) AS hits_last_hour '.
           'FROM '.DB_PREFIX.'hits WHERE job_id = ' . $this->mId . ' AND ip = "' . $ip . '" AND '.
           'created_on >= DATE_ADD(NOW(),INTERVAL -1 HOUR)';
		$result = $db->QueryItem($sql);
		
		// ok to increase view count
		if ($result < MAX_VISITS_PER_HOUR)
		{
			// update hits table
			$sql = 'INSERT INTO '.DB_PREFIX.'hits (job_id, created_on, ip)
			                    VALUES (' . $this->mId . ', NOW(), "' . $ip . '")';
			$db->query($sql);
			
			// update jobs table
			$sql = 'UPDATE '.DB_PREFIX.'jobs SET views_count = views_count + 1
										 WHERE id = ' . $this->mId;
			$db->query($sql);	
		}
	}
     







	// Create a new job post
	public function Create($params)
	{
		global $db;
		
		if ($params['city_id'] == '' || $params['city_id'] == 0)
		{
			$params['city_id'] = 'NULL';
		}
		if ($params['apply_online'] == 1)
		{
			$params['apply_online'] = 1;
		}
		else
		{
			$params['apply_online'] = 0;
		}
		if (($params['salary']) == '')
		{
			$params['salary'] = 0;
		}
		 
		
		if (($params['minexp']) == '')
		{
			$params['minexp'] = "0";
		}
			if (($params['maxexp']) == '')
		{
			$params['maxexp'] = "0";
		}
		if (($params['industry']) == '')
		{
			$params['industry'] = "0";
		}
		if (($params['functional_area']) == '')
		{
			$params['functional_area'] = "0";
		}
		if (($params['qualification']) == '')
		{
			$params['qualification'] = "0";
		}
	 $sql = 'INSERT INTO '.DB_PREFIX.'jobs ( category_id , title, description, skills, company, city_id,state_id,url, apply,salary, minexp, maxexp, industry, functional_area,qualification, created_on, is_temp, is_active, 
			                       views_count, auth, outside_location, poster_email, apply_online, spotlight)
		                         VALUES ('.$params['category_id'].',
		                                 "' . ucwords($params['title']) . '",
		                                 "' . ucfirst($params['description']) . '",
										 "' . ucwords($params['skills']) . '",
		                                 "' . ucfirst($params['company']) . '",
		                                 ' .  $params['city_id'] . ',
										 ' .  $params['state_id'] . ',
		                                 "' . $params['url'] . '",
		                                 "' . $params['apply'] . '",
										 ' . $params['salary'] . ',
										' . $params['minexp'] . ',
										' . $params['maxexp'] . ',
										 ' . $params['industry'] . ',
										' . $params['functional_area'] . ',
										' . $params['qualification']. ' ,
		                                 NOW(), ' . $params['is_temp'] . ', '. $params['is_active'] .', 0, "' . $this->GenerateAuthCode() . '", 
		                                 "' . ucfirst($params['location_outside_ro_where']) . '", "' . $params['poster_email'] . '", ' . $params['apply_online'] . '
		                                 , ' . $params['spotlight'] . ')';
										
		$result = $db->query($sql);
		return $db->insert_id;
	}
	
	// Edit an existing job post
	public function Edit($params)
	{
		global $db;

		if ($params['city_id'] == '' || $params['city_id'] == 0)
		{
			$params['city_id'] = 'NULL';
		}

		if ($params['apply_online'] == 1)
		{
			$params['apply_online'] = 1;
		}
		else
		{
			$params['apply_online'] = 0;
		}
		
		 
		if (($params['salary']) == '')
		{
			$params['salary'] = 0;
		}
		
		if (($params['minexp']) == '')
		{
			$params['minexp'] = "null";
		}
			if (($params['maxexp']) == '')
		{
			$params['maxexp'] = "null";
		}
		if (($params['industry']) == '')
		{
			$params['industry'] = "null";
		}
		if (($params['functional_area']) == '')
		{
			$params['functional_area'] = "null";
		}
		if (($params['qualification']) == '')
		{
			$params['qualification'] = "0";
		}

		$sql = 'UPDATE '.DB_PREFIX.'jobs SET category_id = ' . $params['category_id'] . ',
										        title = "' . ucwords($params['title']) . '",
										        description = "' .ucfirst($params['description']). '",
												skills = "' . ucwords($params['skills']) . '",
										        company = "' .ucfirst($params['company']) . '",
										        city_id = ' . $params['city_id'] . ',
												state_id = ' . $params['state_id'] . ',
										        url = "' . $params['url'] . '",
										        apply = "' . $params['apply'] . '",
                                                salary = ' . $params['salary'] . ',
												minexp = ' . $params['minexp'] . ',
												maxexp = ' . $params['maxexp'] . ',
												industry = ' .$params['industry']. ',
												functional_area = ' .$params['functional_area']. ',
												qualification = ' .$params['qualification']. ',
												outside_location = "' . ucfirst($params['location_outside_ro_where']) . '",
														poster_email = "' . $params['poster_email'] . '",
														apply_online = "' . $params['apply_online'] . '"
										        WHERE id = ' . $params['id'];
		$result = $db->query($sql);
	}
	
	// Publishes a newly created job post (is_temp => 0)
	public function Publish()
	{
		global $db;
		
		$sql = 'UPDATE '.DB_PREFIX.'jobs SET is_temp = 0 WHERE id = ' . $this->mId;
		
		$db->query($sql);
	}
	
	// Activate an inactive job post
	public function Activate()
	{
		global $db;
		$sql = 'UPDATE '.DB_PREFIX.'jobs SET is_active = 1 WHERE id = ' . $this->mId;
		$db->query($sql);
	}
	
	// Deactivate an active job post
	public function Deactivate()
	{
		global $db;
		$sql = 'UPDATE '.DB_PREFIX.'jobs SET is_active = 0 WHERE id = ' . $this->mId;
		$db->query($sql);
	}
	
	// Activate spotlight-feature for a job post
    public function SpotlightActivate()
    {
        global $db;
        $sql = 'UPDATE '.DB_PREFIX.'jobs SET spotlight = 1 WHERE id = ' . $this->mId;
        $db->query($sql);
    }
    
    // Deactivate spotlight-feature for a job post
    public function SpotlightDeactivate()
    {
        global $db;
        $sql = 'UPDATE '.DB_PREFIX.'jobs SET spotlight = 0 WHERE id = ' . $this->mId;
        $db->query($sql);
    }
	
	// Extend a post for 30 days
	public function Extend()
	{
		global $db;
		$sql = 'UPDATE '.DB_PREFIX.'jobs SET created_on = NOW(), is_active = 1 WHERE id = ' . $this->mId;
		if ($db->query($sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	// Make a post temporary
	public function MarkTemporary()
	{
		global $db;
		$sql = 'UPDATE '.DB_PREFIX.'jobs SET is_temp = 1 WHERE id = ' . $this->mId;
		$db->query($sql);
	}
	
	// Delete a job post
	public function Delete()
	{
		global $db;
		$sql = 'DELETE FROM '.DB_PREFIX.'jobs WHERE id = ' . $this->mId;
		$db->query($sql);
	}
	
	// Delete a job post and all aditional information
	public function DeleteJobAdmin()
	{
		global $db;
			
		$sql = 'DELETE FROM '.DB_PREFIX.'hits WHERE job_id  = ' . $this->mId;
		$res = $db->query($sql);	
		
		$sql = 'DELETE FROM '.DB_PREFIX.'job_applications WHERE job_id  = ' . $this->mId;
		$res = $res && $db->query($sql);
		
		$sql = 'DELETE FROM '.DB_PREFIX.'spam_reports WHERE job_id  = ' . $this->mId;
		$res = $res && $db->query($sql);

		$sql = 'DELETE FROM '.DB_PREFIX.'jobs WHERE id  = ' . $this->mId;
		$res = $res && $db->query($sql);
		
		return ($res==false)?$res:true;
	}
	public function MakeValidUrl($string)
	{
		$string = urlencode($string);
		return $string;
	}
	
	public function Exists()
	{
		if ($this->mCreatedOn != '')
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function GenerateAuthCode()
	{
		$auth = md5($this->mId . uniqid() . time());
		return $auth;
	}
	
	public function CountJobs($categ = false, $type = false)
	{
		global $db;
		$condition = '';
	 	
		if ($type)
		{
			if (!is_numeric($type))
			{
				$type_id = $this->GetTypeId($type);
			}
			else
			{
				$type_id = $type;
			}
			
		
		}
		
		if ($categ)
		{
			if (!is_numeric($categ))
			{
				$categ_id = $this->GetCategId($categ);
			}
			else
			{
				$categ_id = $categ;
			}
			
			$condition .= ' AND category_id = ' . $categ_id;
		}

		$sql = 'SELECT COUNT(id) AS total FROM '.DB_PREFIX.'jobs WHERE is_temp = 0 AND is_active = 1' . $condition;
		
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['total'];	
	}
	
	public function CountJobsOfType($type_id)
	{
		global $db;

		$sql = 'SELECT COUNT(id) AS total FROM '.DB_PREFIX.'jobs WHERE is_temp = 0 AND is_active = 1 AND type_id = ' . $type_id;
		
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['total'];
	}
	
	public function GetJobsCountForAllCategs()
	{
		global $db;
		$jobsCountPerCategory = array();
		
		$sql = 'SELECT category_id, COUNT(id) AS total FROM '.DB_PREFIX.'jobs WHERE is_temp = 0 AND is_active = 1 GROUP BY category_id'; 
		$result = $db->query($sql);
		
		while ($row = $result->fetch_assoc())
			$jobsCountPerCategory[$row['category_id']] = $row['total'];
			
		$categs = get_categories();
		$result = array();
		foreach ($categs as $categ)
		{
			$count = 0;
			
			// this check is needed because we don't have an entry if there are no jobs for a category
			if (isset($jobsCountPerCategory[$categ['id']]))
				$count = $jobsCountPerCategory[$categ['id']];
				
			$result[] = array('categ_name' => $categ['name'], 'UTF-8', 'categ_count' => $count, 'categ_varname' => $categ['var_name']);
		}
		return $result;
	}
	
	public function GetJobsCountPerCity()
	{
		global $db;
		$jobsCountPerCity = array();
		
		$sql = 'SELECT city_id, COUNT(id) AS total FROM '.DB_PREFIX.'jobs WHERE is_temp = 0 AND is_active = 1 and city_id IS NOT NULL GROUP BY city_id'; 
		$result = $db->query($sql);
		
		while ($row = $result->fetch_assoc())
			$jobsCountPerCity[$row['city_id']] = $row['total'];
			
		$cities = get_cities();
		$result = array();

		foreach ($cities as $city)
		{
			$numberOfJobsInCity = 0;
			
			// this check is needed because we don't have an entry if there are no jobs for a city
			if (isset($jobsCountPerCity[$city['id']]))
				$numberOfJobsInCity = $jobsCountPerCity[$city['id']];

			$result[] = array('city_name' => $city['name'], 'jobs_in_city' => $numberOfJobsInCity, 'city_ascii_name' => $city['ascii_name']);
		}
		
		return $result;
	}
	
	public function GetJobsCountForCity($city_id, $type)
	{
		global $db;
		
		$condition = '';
		
		if ($city_id)
		{
			$condition = ' AND city_id = ' . $city_id;
		}
		else
		{
			$condition = ' AND city_id IS NULL';
		}
		
		if ($type)
		{
			if (!is_numeric($type))
			{
				$type_id = $this->GetTypeId($type);
			}
			else
			{
				$type_id = $type;
			}
			
			$condition .= ' AND type_id = ' . $type_id;
		}
		
		$sql = 'SELECT COUNT(id) AS total FROM '.DB_PREFIX.'jobs WHERE is_temp = 0 AND is_active = 1'. $condition;

		$result = $db->query($sql);
		
		$row = $result->fetch_assoc();
		
		return $row['total'];
	}
	
	public function GetNumberOfJobsInOtherCities()
	{
		global $db;
		
		$sql = 'SELECT COUNT(id) AS total FROM '.DB_PREFIX.'jobs WHERE is_temp = 0 AND is_active = 1 AND city_id IS NULL';

		$result = $db->query($sql);
		
		$row = $result->fetch_assoc();
		
		return $row['total'];
	}
	
	public function GetPaginatedJobsForOtherCities($type_id = false, $firstLimit = false, $lastLimit = false)
	{
		global $db;
		$jobs = array();
		$conditions = '';
		
		// if $type_id is, in fact, the type's var_name, 
		// get the type's id
		if (!is_numeric($type_id))
		{
			$type_id = $this->GetTypeId($type_id);
		}
		
		if (is_numeric($type_id) && $type_id != 0)
		{
			$conditions .= ' AND type_id = ' . $type_id;
		}

		if ($firstLimit >= 0 && $lastLimit >= 0)
		{
			$sql_limit = 'LIMIT ' . $firstLimit .', ' . $lastLimit;
		}
		else
		{
		        $sql_limit = '';        
		}
		
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'jobs
		               WHERE city_id IS NULL' . $conditions . ' AND is_temp = 0 AND is_active = 1
		               ORDER BY created_on DESC ' . $sql_limit;
		
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$current_job = new Job($row['id']);
			$jobs[] = $current_job->GetInfo();
		}
		return $jobs;
	}
	
	// Check if the poster of this post has posted before with this e-mail address
	public function IsApprovedPosterEmail()
	{
		global $db;
		 $sql = 'SELECT poster_email FROM '.DB_PREFIX.'jobs 
		                  WHERE poster_email = "' . strtolower($this->mPosterEmail) . '" AND id <> ' . $this->mId . ' AND is_temp = 0
 		                        AND (is_active = 1 OR (is_active = 0 AND created_on < DATE_SUB(NOW(), INTERVAL 30 DAY)))';

		$result = $db->query($sql);
				
		$row = $result->fetch_assoc();
		if (!empty($row['poster_email']))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function GetApplicationsStatistics($jobIDs)
	{
		global $db;
		
		$statisticalData = array();
		
		$sql = 'SELECT job_id, count(id) numberOfApplications, DATE_FORMAT(max(created_on), "' . DATE_TIME_FORMAT . '") lastApplicationOn 
				FROM '.DB_PREFIX.'job_applications j 
				WHERE job_id in (' . $this->buildCommaSeparatedIDsString($jobIDs) . ') GROUP BY job_id'; 
		$result = $db->query($sql);
		
		while ($row = $result->fetch_assoc())
			$statisticalData[$row['job_id']] = $row;
			
		return $statisticalData;
	}
	//------------------------------------- Search for jobs
	public function jobsearch($keywords)
	{
     global $db;
     $jobs = array();
 
     $spchars = array(",",";",":");
     $keywords = str_replace($spchars," ", trim($keywords));
 
     $sql = 'SELECT a.id AS id
                    FROM jobs a, cities b
                    WHERE a.city_id = b.id
                    AND a.is_temp = 0 AND a.is_active = 1
                    AND MATCH (a.title, a.description, a.company, a.outside_location, b.name)
                    AGAINST ("'. $keywords .'" IN BOOLEAN MODE )';
        $result = $db->query($sql);
 
        while ($row = $result->fetch_assoc())
        {
            $current_job = new Job($row['id']);
            $jobs[] = $current_job->GetBasicInfo();
        }
        return $jobs;
    }
	//---------------------------------end
	public function GetSpamReportStatistics($jobIDs)
	{
		global $db;
		
		$statisticalData = array();
		
		$sql = 'SELECT job_id, count(id) numberOfSpamReports, DATE_FORMAT(max(the_time), "' . DATE_TIME_FORMAT . '") lastSpamReportOn 
				FROM '.DB_PREFIX.'spam_reports 
				WHERE job_id in (' . $this->buildCommaSeparatedIDsString($jobIDs) . ') GROUP BY job_id'; 
		$result = $db->query($sql);
		
		while ($row = $result->fetch_assoc())
			$statisticalData[$row['job_id']] = $row;
			
		return $statisticalData;
	}
	
	private function buildCommaSeparatedIDsString($numbersArray)
	{
		$string = '';
		
		for ($i = 0; $i < count($numbersArray); $i++)
		{
			$string .= $numbersArray[$i];

			if ($i < count($numbersArray) - 1)
				$string .= ',';
		}
		
		return $string;
	}

}
?>
