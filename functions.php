<?php

function add_single_quotes($arg) 
{
	
	return "'" . addcslashes($arg, "'\\") . "'"; 
}

function get_cities_cloud()
{
	global $db;
	$city_array = array();
 
	$sql = 	'SELECT c.id, c.name, c.ascii_name, COUNT(*) AS nr
			 FROM '.DB_PREFIX.'cities c 
			 INNER JOIN '.DB_PREFIX.'jobs j ON (j.city_id = c.id ) 
			 WHERE j.is_active = 1 
			 GROUP BY c.name';
 
	$cities = $db->QueryArray($sql);
 
	foreach ($cities as $city)
	{
		$numberOfJobs = $city['nr'];
 
		$city_array[] = array('name' => $city['name'],
		                     'varname' => $city['ascii_name'],
		                     'count' => $numberOfJobs,
		                     'tag_height' => get_cloud_tag_height($numberOfJobs));
	}
 
	return $city_array;
}

function get_cloud_tag_height($numberOfItems)
{
	if ($numberOfItems < 2)
	{
		$tag_height = 1;
	}
	else if ($numberOfItems >= 2 && $numberOfItems < 3)
	{
		$tag_height = 2;
	}
	else if ($numberOfItems >= 3 && $numberOfItems < 4)
	{
		$tag_height = 3;
	}
	else if ($numberOfItems >= 4 && $numberOfItems < 5)
	{
		$tag_height = 4;
	}
	else if ($numberOfItems >= 5 && $numberOfItems < 6)
	{
		$tag_height = 5;
	}
	else if ($numberOfItems >= 6)
	{
		$tag_height = 6;
	}
	
	return $tag_height;
}

function get_categories()
{
    global $db;
    $categories = array();
    $sql = 'SELECT *
                   FROM '.DB_PREFIX.'categories
                   ORDER BY category_order ASC';
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc())
    {
        $categories[] = array('id' => $row['id'], 'name' => $row['name'], 'var_name' => $row['var_name'], 'title' => $row['title'], 'description' => $row['description'], 'keywords' => $row['keywords']);
    }
    return $categories;
}

function get_articles()
{
	global $db;
	$articles = array();
	$sql = 'SELECT id, title, page_title, url 
	               FROM '.DB_PREFIX.'pages
	               ORDER BY title ASC';
	$result = $db->query($sql);
	while ($row = $result->fetch_assoc())
	{
		$articles[$row['url']] = $row;
	}
	return $articles;
}

function get_navigation($menu = false)
{
	global $db;
	
	$conditions = '';
	
	if (isset($menu) && ($menu == 'primary' || $menu == 'secondary' || $menu == 'footer1' || $menu == 'footer2' || $menu == 'footer3'))
		$conditions = ' WHERE menu = \''.$menu.'\'';
	
	$navigation = array();

	$sql = 'SELECT id, url, name, title, menu
				FROM '.DB_PREFIX.'links
				' . $conditions . '
				ORDER BY link_order ASC';

	$result = $db->query($sql);
	while ($row = $result->fetch_assoc())
	{
		$url_check = substr($row['url'], 0, 4);
		if ($url_check == 'http' || $url_check == 'www.') $outside = 1; else $outside = 0; 
		
		$navigation[$row['menu']][] = array(
								'id' => $row['id'],
								'url' => $row['url'],
								'name' => $row['name'],
								'title' => $row['title'],
								'menu' => $row['menu'],
								'outside' => $outside);
	}
	return $navigation;
}

function get_cities()
{
	global $db;
	
	$cities = array();
	
	$sql = 'SELECT DISTINCT id, name , ascii_name
	               FROM '.DB_PREFIX.'cities
	               ORDER BY name ASC';
	
	$result = $db->query($sql);
	
	while ($row = $result->fetch_assoc())
	{
		$cities[] = array('id' => $row['id'], 'name' => $row['name'],'ascii_name' => $row['ascii_name']);
	}
	
	return $cities;
}

function get_countries()
{
	global $db;
	
	$countries = array();
	
	$sql = 'SELECT * 
	               FROM '.DB_PREFIX.'countries
	               ORDER BY name ASC';
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
	{
		$countries[] = array('id' => $row['id'],'country' => $row['name']);
	}
		return $countries;
}
function education_list()
{
	global $db;
	$education = array();
	$sql = 'SELECT * FROM '.DB_PREFIX.' education_list ORDER BY name ASC';
	
	$result = $db->query($sql);
	
	while ($row = $result->fetch_assoc())
	{
		$education[] = array('id' => $row['id'] , 'name' => $row['name']);
	}
	return $education;
}
//Funational area list
function jobs_list() 
{
	global $db;
	$jobslist = array();
		$sql = 'SELECT *
	               FROM '.DB_PREFIX.' types_jobs
	               ORDER BY name ASC';
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
	{
		$jobslist[] = array('id' => $row['id'] , 'name' => $row['name']);
	}
		return $jobslist;
		}
function get_years()
{
	global $db;
		$years = array();
		$sql = 'SELECT * 
	               FROM '.DB_PREFIX.'years
	               ORDER BY id ASC';
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
	{
		$years[] = array('id' => $row['id'], 'years' => $row['years']);
	}
		return $years;
}
function get_months()
{
	global $db;
		$months = array();
		$sql = 'SELECT * 
	               FROM '.DB_PREFIX.'months
	               ORDER BY id ASC';
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
	{
		$months[] = array('id' => $row['id'], 'months' => $row['months']);
	}
		return $months;
}
function get_salary()
{
	global $db;
		$salary = array();
		$sql = 'SELECT * 
	               FROM '.DB_PREFIX.'salary
	               ORDER BY id ASC';
	
	$result = $db->query($sql);
	
	while ($row = $result->fetch_assoc())
	{
		$salary[] = array('id' => $row['id'], 'salary' => $row['salary']);
	}
	
	return $salary;
}
//salary for thousands
function get_salary_thousands()
{
	global $db;
	
	$salary = array();
	
	$sql = 'SELECT * 
	               FROM '.DB_PREFIX.'salary_thousands
	               ORDER BY id ASC';
	
	$result = $db->query($sql);
	
	while ($row = $result->fetch_assoc())
	{
		$salary_thousands[] = array('id' => $row['id'], 'salary_thousands' => $row['salary_thousands']);
	}
	
	return $salary_thousands;
}
function get_qualification()
{
	global $db;
		$qualification = array();
		$sql = 'SELECT DISTINCT id,qualification
	               FROM '.DB_PREFIX.'qualification
	               ORDER BY id ASC';
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
	{
		$qualification[] = array('id' => $row['id'], 'qualification' => $row['qualification']);
	}
		return $qualification;
}
//industries list
function get_industries()
{
	global $db;
	
	$industries = array();
	
	$sql = 'SELECT DISTINCT industry_id, name
			FROM '.DB_PREFIX.'industries
	               ORDER BY name ASC';
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
	{
		$industries[] = array('industry_id' => $row['industry_id'], 'name' => $row['name']);
	}
		return $industries;
}
/*get file extension*/
function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

function get_categ_id_by_varname($var_name)
{
	global $db;
	$sql = 'SELECT id FROM '.DB_PREFIX.'categories WHERE var_name = "' . $var_name . '"';
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	return $row['id'];
}

function get_categ_name_by_varname($var_name)
{
    global $db;
    $sql = 'SELECT name FROM '.DB_PREFIX.'categories WHERE var_name = "' . $var_name . '"';
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    return $row['name'];
}

function get_city_id_by_asciiname($ascii_name)
{
	global $db;
		$city = null;
		$sql = 'SELECT id, name
	               FROM '.DB_PREFIX.'cities
	               WHERE ascii_name = "' . $ascii_name . '"';
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
		if ($row)
		$city = array('id' => $row['id'], 'name' => $row['name']);
			return $city;
}

/**
* Converts the multidimensional array that results after calling parse_ini_file (filePath, processSections = true)
* to a JSON string.
* The resulting JSON string will look something like this:
* {"sectionOne": {"messageKeyOne": "messageTextOne", "messageKeyTwo": "messageTextTwo"}, "sectionTwo": {....},....}
*
* @author putypuruty
*/
function iniSectionsToJSON($iniSections)
{
	$translationsJson = "{";
	$sectionsCount = 0;
		
	foreach ($iniSections as $section => $sectionMessages)
	{
		$translationsJson = $translationsJson . "\"" . $section . "\": {";
		$sectionMessagesCount = 0;
				foreach ($sectionMessages as $messageKey => $messageText)
		{
			$translationsJson = $translationsJson . "\"".$messageKey . "\":\"" . preg_replace("/\r?\n/", "\\n", addslashes($messageText)) . "\"";
			
			$sectionMessagesCount++;
			
			if ($sectionMessagesCount < count($sectionMessages))
				$translationsJson .= ",";
		}
		$translationsJson .= "}";
				$sectionsCount++;
		if ($sectionsCount < count($iniSections))
			$translationsJson .= ",";
	}
		$translationsJson = $translationsJson."}";
		return $translationsJson;
}

/**
 * Returns the city with the specified ID or null
 * if the city was not found.
 *
 * @param $cityID
 * @return 
 */
function get_city_by_id($cityID)
{
	global $db;
		$city = null;
		$sql = 'SELECT id, name
	               FROM '.DB_PREFIX.'cities
	               WHERE id = ' . $cityID;
	$result = $db->query($sql);
		$row = $result->fetch_assoc();
		if ($row)
		$city = array('id' => $row['id'], 'name' => $row['name']);
		return $city;  
}

function get_types()
{
	global $db;
	$sql = 'SELECT id, name, var_name 
		FROM '.DB_PREFIX.'types ';
	$result = $db->query($sql);
	$types = array();
	while($row = $result->fetch_assoc())
	{
		$types[] = array('id' => $row['id'], 'name' => $row['name'], 'var_name' => $row['var_name']);
	}
	return $types;
}

function get_type_id_by_varname($var_name)
{
	global $db;
	$sql = 'SELECT id FROM '.DB_PREFIX.'types WHERE 
		var_name = "'.$var_name.'"';
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
		if ($row)
		return $row['id'];
	return false;
}
function get_type_varname_by_id($id)
{
	global $db;
	$sql = 'SELECT var_name FROM '.DB_PREFIX.'types WHERE 
		id = '.$id;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	
	if ($row)
		return $row['var_name'];
	return false;
}

function get_category_by_var_name($var_name)
{
	global $db;
	$category = null;
		$sql = 'SELECT *
	               FROM '.DB_PREFIX.'categories
	               WHERE var_name = "' . $var_name . '"';
		$result = $db->query($sql);
	$row = $result->fetch_assoc();
		if ($row)
		$category = build_category_from_result_set_row($row);
		return $category;
}
function get_category_by_id($id)
{
	global $db;
	$category = null;
		$sql = 'SELECT *
	               FROM '.DB_PREFIX.'categories
	               WHERE id = ' . $id;
		$result = $db->query($sql);
	    $row = $result->fetch_assoc();
		if ($row)
		$category = build_category_from_result_set_row($row);
		return $category;
}
function build_category_from_result_set_row($row)
{
	return array('id' => $row['id'], 'name' => $row['name'], 'var_name' => $row['var_name'], 
			     'title' => $row['title'], 'description' => $row['description'],
			     'keywords' => $row['keywords'], 'category_order' => $row['category_order']);
}

function generate_sitemap($type)
{
    global $db;
    $sanitizer = new Sanitizer;
    // Get all links
    $result = $db->query('SELECT url FROM '.DB_PREFIX.'links');
    while ($row = $result->fetch_assoc()) if (!strstr($row['url'], 'http://')) $sitemap[BASE_URL . $row['url'] . '/'] = 1;
        // Get all custom pages
    $result = $db->query('SELECT url FROM '.DB_PREFIX.'pages');
    while ($row = $result->fetch_assoc()) $sitemap[BASE_URL . $row['url'] . '/'] = 1; 
        // Get all categories
    $categories = get_categories();
    $i = 0; while($i < count($categories)) { $sitemap[BASE_URL . URL_JOBS . '/' . $categories[$i]['var_name'] . '/'] = 1; $i++; }
        // Get all cities
    $cities = get_cities();
    $i = 0; while($i < count($cities)) { $sitemap[BASE_URL . URL_JOBS_IN_CITY . '/' . $cities[$i]['ascii_name'] . '/'] = 1; $i++; }
    // Get all companies
    $result = $db->query('SELECT company FROM '.DB_PREFIX.'jobs WHERE is_temp = 0 AND is_active = 1 GROUP BY company');
    while ($row = $result->fetch_assoc()) $sitemap[BASE_URL . URL_JOBS_AT_COMPANY . '/' . $sanitizer->sanitize_title_with_dashes($row['company']) . '/'] = 1;
     // Get all active Jobs
    $result = $db->query('SELECT id, title, company FROM '.DB_PREFIX.'jobs WHERE is_active = 1 AND is_temp = 0');
    while ($row = $result->fetch_assoc()) $sitemap[BASE_URL . URL_JOB . '/' . $row['id'] . '/' . $sanitizer->sanitize_title_with_dashes($row['title'])] = 1;
       // Generate output
    if ($type == 'xml')
    {
        header('Content-Type: text/xml; charset="utf-8"');
        
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
                foreach ($sitemap as $url => $value)
        {
            echo '<url><loc>'.$url.'</loc></url>';
        }
        echo '</urlset>';
    }
    else
    {
        foreach ($sitemap as $url => $value)
        {
            echo $url.'<br />';
        }        
    }
}
function get_user_info()
{
	global $db;
	
	$user = array();
	$userid=$_SESSION['UserId'] ;
	 $sql = 'SELECT email,firstname,lastname,contact_number,city_id,gender,category,total_exp,salary,
	 qualification,education_specialization,year_of_passout,institute_name,skills,resume_path,
	 job_title,company_name,industry,functional_area,latest_job_exp
	               FROM '.DB_PREFIX.'user_info
	               where id="'.$userid.'" ';
	
	 $result = $db->query($sql);
		while ($row = $result->fetch_assoc())
	{
		$user_info[] = array('email' => $row['email'],'firstname' => $row['firstname'], 'lastname' => $row['lastname'],'contact_number' => $row['contact_number'], 'city_id' => $row['city_id'],'gender' => $row['gender'],'category'=>$row['category'],'total_exp' => $row['total_exp'],'salary' => $row['salary'], 'qualification' => $row['qualification'],'education_specialization' => $row['education_specialization'],'year_of_passout'=>$row['year_of_passout'],
			'institute_name' => $row['institute_name'],
			 'job_title'=>$row['job_title'],'company_name'=>$row['company_name'],'industry'=>$row['industry'],'functional_area' => $row['functional_area'],'latest_job_exp'=>$row['latest_job_exp'],			
		'skills'=>$row['skills'],'resume_path' => $row['resume_path']);
	}
	
	return $user_info;
}
function get_year_of_passout()
{
	 global $db;
	 
	 $cities = array();
	 
	  $sql = 'SELECT id,year_of_passout
					FROM year_of_passout
					ORDER BY id  DESC';
	 
	 $result = $db->query($sql);
	 
	 while ($row = $result->fetch_assoc())
	 {
	  $year_of_passout[] = array('id' => $row['id'], 'year_of_passout' => $row['year_of_passout']);
	 }
	 
	 return $year_of_passout;
}


# Start a session
session_start();
# Check if a user is logged in
function isLogged()
	{
    if(isset($_SESSION['UserId']))
		{ 
		# When logged in this variable is set to TRUE
        return TRUE;
		}
	else
		{
        return FALSE;
		}
}

# Log a user Out
function logOut()
{
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) 
	{
        setcookie(session_name(), '', time()-42000, '/');
    }
    session_destroy();
}

# Session Logout after in activity
function sessionX()
{
    $logLength = 1800; # time in seconds :: 5 = 5 seconds
    $ctime = strtotime("now"); # Create a time from a string
    # If no session time is created, create one
    if(!isset($_SESSION['sessionX']))
		{ 
        # create session time
        $_SESSION['sessionX'] = $ctime; 
	    }
	else
		{
        # Check if they have exceded the time limit of inactivity
        if(((strtotime("now") - $_SESSION['sessionX']) > $logLength) && isLogged())
			{
            # If exceded the time, log the user out
            logOut();
            # Redirect to login page to log back in
            header("Location:{$BASE_URL}logout/");
            exit;
		    }
		else
			{
			# If they have not exceded the time limit of inactivity, keep them logged in
            $_SESSION['sessionX'] = $ctime;
			}
		}
}
# Run Session logout check
sessionX();

?>