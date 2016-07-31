<?php
class Userlist
{
var $mId = false;
var $mFirstName = false;
var $mLastName = false;
var $mGender = false;
var $mCategory = false;
var $mJobTitle = false;
var $mCompanyName = false;
var $mInstutiteName = false;
var $mSkills = false;
var $mCityId = false;
var $mStateId = false;
var $mTotalExperience = false;
var $mIndustry = false;
var $mFunctionalArea = false;
var $mLatestJobExperience = false;
var $mQualification = false;
var $mEducationSpecilization = false;
var $mYearofPassout = false;
var $mUrlTitle = false;
var $mEmail = false;
var $mContactNumber = false;
var $mResumePath = false;
var $mRecentLogin = false;
var $mCreatedDate = false;
var $mSms = false;
function __construct($id = false)
{ 
	global $db;
	if (is_numeric($id))
	{
	$sanitizer = new Sanitizer;
	$sql = 'SELECT firstname,lastname,email,gender,category,job_title, company_name,institute_name, skills,city_id,state_id,total_exp,salary,industry,functional_area,latest_job_exp,qualification, education_specialization,year_of_passout,contact_number,resume_path , recent_login , created_date , sms ,id FROM '.DB_PREFIX.' user_info where id='.$id; 
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
		if (!empty($row))
		{
			$this->mId = $id;
			$this->mFirstName = $row['firstname'];
			$this->mLastName = $row['lastname'];
			$this->mEmail = $row['email'];
			$this->mGender = $row['gender'];
			$this->mCategory = $row['category'];
			$this->mContactNumber = $row['contact_number'];
			$this->mJobTitle = $row['job_title'];
			$this->mCompanyName = $row['company_name'];
			$this->mInstutiteName = $row['institute_name'];
			$this->mSkills = $row['skills'];
			$this->mCityId = $row['city_id'];
			$this->mStateId = $row['state_id'];
			$this->mUrlTitle = $sanitizer->sanitize_title_with_dashes($this->mJobTitle . ' at ' . $this->mCompanyName);
			$this->mSalary= $row['salary'];
			$this->mTotalExperience = $row['total_exp'];
			$this->mLatestJobExperience = $row['latest_job_exp'];
			$this->mIndustry = $row['industry'];
			$this->mFunctionalArea = $row['functional_area'];
			$this->mQualification = $row['qualification'];
			$this->mEducationSpecilization = $row['education_specialization'];
			$this->mYearofPassout = $row['year_of_passout'];
			$this->mResumePath = $row['resume_path'];
			$this->mRecentLogin = $row['recent_login'];
			$this->mCreatedDate = $row['created_date'];
			$this->mSms = $row['sms'];
		}
	}
}
//functions for pagination 
public function GetUserInfo()
	{
		$user= array  ('id' => $this->mId,
			'firstname' => $this->mFirstName,
			'lastname'  => $this->mLastName,
			'email' => $this->mEmail,
			'gender'   => $this->mGender,
			'category' => $this->mCategory ,
			'contact_number' => $this->mContactNumber,
			'job_title' => $this->mJobTitle,
			'company_name' => $this->mCompanyName,
			'institute_name' => stripslashes($this->mInstutiteName),
			'skills' => $this->mSkills,
			'city_id' => $this->mCityId,
			'state_id' => $this->mStateId,
			'url_title' => stripslashes($this->mUrlTitle),
			'salary' => $this->mSalary,
			'total_exp' => stripslashes($this->mTotalExperience),
			'latest_job_exp' => stripslashes($this->mLatestJobExperience),
			'industry' => stripslashes($this->mIndustry),
			'functional_area' => stripslashes($this->mFunctionalArea),
			'qualification' => stripslashes($this->mQualification),
			'education_specialization' => stripslashes($this->mEducationSpecilization),
			'year_of_passout' => $this->mYearofPassout,
			'resume_path' => $this->mResumePath,
			'recent_login' => $this->mRecentLogin,
			'created_date' => $this->mCreatedDate,
			'sms' => $this->mSms
		);
	  return $user;
    }

	public function Simple_Search($keywords, $url_query, $start_page = 1)
	{
		global $db;
		$user_info = array();
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
					$sql = 'SELECT id FROM '.DB_PREFIX.'user_info WHERE outside_location LIKE "%' . $word . '%"';
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
					$conditions .= ' AND (job_title LIKE "%' . $keywords . '%" OR company_name LIKE "%' . $keywords . '%"' .  ' OR skills LIKE "%' . $keywords . '%")';	
				}
			}
 
			if (!$found_city)
			{
				if ($kw1 != '')
				{
					$conditions .= ' (job_title LIKE "%' . $kw1 . '%" OR skills LIKE "%' . $kw1 . '%")';
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
					//$conditions .= ' AND (outside_location LIKE "%' . $kw2 . '%" ' . $extra_conditions . ')';
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
					$conditions = 'job_title LIKE "%' . $keywords . '%" OR company_name LIKE "%' . $keywords . '%"' .  ' OR skills LIKE "%' . $keywords . '%"';
 
					$_SESSION['keywords_array'][] = $keywords;
				}
			}
 
			$sql = 'SELECT id
		               FROM '.DB_PREFIX.'user_info
		               WHERE  (' . $conditions .$extra_conditions .')
		               ORDER BY created_date DESC';
			
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
 
		    //Search in user_info
		    for ($i=0; $i < count($keywords_r); $i++)
		    {
		        if ($cities[$i] != "") {
		          $cities[$i] = rtrim($cities[$i]);
		          $cities_r = explode(' ', $cities[$i]);
 
		          for ($a=0; $a < count($cities_r); $a++)
		          {
		            $check_cities .= ' OR city_id = "'.$cities_r[$a].'" ';
		          }
		        }
		        $conditions .= 'AND (job_title LIKE "%' . $keywords_r[$i] . '%" OR skills LIKE "%' . $keywords_r[$i] . '%" )';
		    }
 
			$sql = 'SELECT id
					FROM '.DB_PREFIX.'user_info
					WHERE '. $conditions .'
					ORDER BY created_date DESC';
			$result = $db->query($sql);			
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
				$current_job = new Userlist($id_array[$start_count]);
				$user_info[] = $current_job->GetUserInfo();
				$current_loop++;
				$start_count++;
			}
		}
 
		$_SESSION['search_results'] = $user_info;
		$_SESSION['search_pagination'] = $pages;
		return $user_info;
	}
	/* Simple Search Records closed */
	/*Advance Search */
public function AdvanceSearch($location=null, $title_skills=null , $minexp=null,$maxexp=null ,$minsalary=null , $maxsalary=null ,$area=null,$industry= null, $start_page =1)
	{
		global $db;
		$users = array();
		$location=ucfirst($location);
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
					
					 $conditions .='  job_title LIKE "%' . $title  . '%"';
					
				}
				if($skills != '')
				{
					
					$conditions .=' and skills LIKE "%' . $skills  . '%"';
				}
				
			}
			elseif($title_skills != '' ){
				$con .='&title_skills='.$title_skills;
				$conditions .=' job_title LIKE "%' . $title_skills  . '%"';
			}

		  if($location != null){
			  $con .='&location='.$location;
			  if($title_skills != ''){
					 $conditions .=' and ';
				}
			  $conditions .= ' city_id = ' . $location;
			 /* $sql = 'SELECT id FROM '.DB_PREFIX.'cities WHERE name LIKE "%' . $location . '%"';
			  $result = $db->query($sql);
			  $row = $result->fetch_assoc();
			  if ($row['id'] != '')
				{
					if($title_skills != ''){
					 $conditions .=' and ';
					 }
					$conditions .= ' city_id = ' . $row['id'];
					
				}
			else{
				// try to find city based on postcode or location_details
				$conditions .=' and outside_location LIKE "%' . $location  . '%"';
				}*/
		  }
		 
		// maxexp and minexp
		if($maxexp == null && $minexp != null){
			if($title_skills != '' || $location != ''){
				$conditions .=' and';
			}
			$con .='&minexp='.$minexp;
			$conditions .= '  total_exp >= '.$minexp;
		 }
		 if($maxexp != null && $minexp == null){
			if($title_skills != '' || $location != ''){
				$conditions .=' and';
			}
			$con .='&maxexp='.$maxexp;
			$conditions .= ' total_exp <= '.$maxexp;
		  }
		 if($maxexp != null && $minexp != null){
			if($title_skills != '' || $location != ''){
				$conditions .=' and';
			}
			$con .='&minexp='.$minexp.'&maxexp='.$maxexp;
			$conditions .= ' (total_exp <= ' .$maxexp.' And total_exp >='.$minexp.')'; 		
		}
		//Salary
		 if($maxsalary != null && $minsalary == null){
			if($maxexp != '' || $minexp != '' || $title_skills != '' || $location != ''){
				$conditions .=' and';
			}
			$con .='&maxsalary='.$maxsalary;
			$conditions .= '  salary <= '.$maxsalary;
		 }
		if($maxsalary == null && $minsalary != null){
			if($maxexp != '' || $minexp != '' || $title_skills != '' || $location != ''){
				$conditions .=' and';
			}
			$con .='&minsalary='.$minsalary;
			$conditions .= ' salary >= '.$minsalary;
		 }
		 if($maxsalary != null && $minsalary != null){
			if($maxexp != '' || $minexp != '' || $title_skills != '' || $location != ''){
				$conditions .=' and';
			}
			$con .='&minsalary='.$minsalary.'&maxsalary='.$maxsalary;
			$conditions .= ' (salary <= ' .$maxsalary.' And salary >='.$minsalary.')'; 		
		}
		if($area != null){
			if($maxsalary != '' || $minsalary != '' || $maxexp != '' || $minexp != '' || 
			$title_skills != '' || $location != ''){
				$conditions .=' and';
			}
			$con .='&area='.$area;
			$conditions .= ' functional_area = '. $area;
		}
		
		if($industry != null){
			if($area != '' || $maxsalary != '' || $minsalary != '' || $maxexp != '' || $minexp != '' || 
			$title_skills != '' || $location != ''){
				$conditions .= ' and';
			}
			$con .='&industry='.$industry;
			$conditions .=' industry = '.$industry;
		}
		$sql = 'SELECT id
		               FROM '.DB_PREFIX.'user_info
		               WHERE ' . $conditions . '
		               ORDER BY created_date DESC';
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
 		    $location = str_replace(","," ", $location);
		    $location = str_replace("  "," ", $location);
		    $location = rtrim($location);
 		    $keywords_a = preg_split( "/[\s,]*\\'([^\\\"]+)\\'[\s,]*|[\s,]+/", $location, 0, PREG_SPLIT_DELIM_CAPTURE );
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
			elseif (($pagination_loop - 1) > 0) $pages .= "&nbsp;<a href='".BASE_URL."advance_search/?p=".($pagination_loop - 1).$con."'>&laquo;</a>&nbsp;";
 			$pagination_top = $pagination_loop + $max_visible_pages + 1;
 			while (($pagination_loop < ($total_pages+1)) && ($pagination_loop < $pagination_top))
			{
				if ($pagination_loop == $start_page) $pages .= "&nbsp;<a class='current_page' href='".BASE_URL."advance_search/?p=$pagination_loop".$con."'>$pagination_loop</a>&nbsp;";
				else $pages .= "&nbsp;<a href='".BASE_URL."advance_search/?p=$pagination_loop".$con."'>$pagination_loop</a>&nbsp;";
				$pagination_loop++;	
			}
 			if ($pagination_loop == $pagination_top) $pages .= "&nbsp;<a href='".BASE_URL."advance_search/?p=".($pagination_loop).$con."'>&raquo;</a>&nbsp;";
 		}
 		if ($id_array != '')
		{
			while (($current_loop < $total_loop) && ($current_loop < ($max_loop )))
			{
				$current_job = new Userlist($id_array[$start_count]);
				$users[] = $current_job->GetUserInfo();
				$current_loop++;
				$start_count++;
			}
		}
 
			$_SESSION['search_results'] = $users;
			$_SESSION['search_pagination'] = $pages;
		return $users;
	}
	/* Advance Search Records closed */
	public function getRows()
 	{
 		return $this->rows;
 	}

public function getuserCount()
	{
		global $db;
		$sql = 'SELECT COUNT(id) AS total FROM '.DB_PREFIX.'user_info';
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['total'];	
	}
public function GetPaginateduser($startIndex, $numberOfJobsToGet)
		{
			global $db;
			$users = array();
			$sql = 'SELECT id,firstname,lastname,email,contact_number,resume_path FROM '.DB_PREFIX.'user_info';
			$sql .= ' ORDER BY id DESC limit ' . $startIndex . ',' .$numberOfJobsToGet;
			$result = $db->query($sql);
			while ($row = $result->fetch_assoc())
			{
				$current_user = new Userlist($row['id']);
				$users[] = $current_user->GetUserInfo();
			}
			return $users;
    }
// Delete  user from DB
	public function Delete()
	{
		global $db;
		$sql = 'DELETE FROM '.DB_PREFIX.'user_info WHERE id = ' . $this->mId;
		$db->query($sql);
	}

	public function Deleteuser()
	{
		global $db;
		
		$sql = 'DELETE FROM '.DB_PREFIX.'job_applications WHERE user_id  = ' . $this->mId;
		$res = $res && $db->query($sql);

		$sql = 'DELETE FROM '.DB_PREFIX.'user_info WHERE id  = ' . $this->mId;
		$res = $res && $db->query($sql);
		
		return ($res==false)?$res:true;
	}
}
?>