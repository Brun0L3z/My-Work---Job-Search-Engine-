<?php
$user = new Userlist($id); 
$smarty->assign('education_specialization',education_list());
$smarty->assign('qualification',get_qualification());
$smarty->assign('passout',get_year_of_passout());
$smarty->assign('city',get_cities());
$smarty->assign('years',get_years());
$smarty->assign('months',get_months());
$smarty->assign('salary',get_salary());
$smarty->assign('countries',get_countries());
$smarty->assign('states',get_states());
$smarty->assign('industries',get_industries());
$smarty->assign('thousands' , get_salary_thousands());
$smarty->assign('area', jobs_list());
if(isset($_SERVER['HTTP_REFERER']))
{
	$currentLinksPage = explode('/', rtrim($_SERVER['HTTP_REFERER'], '/'));
	if($currentLinksPage[5] == 'user')
	{
		$smarty->assign('back_link', BASE_URL . 'user/'. $currentLinksPage[6] );
		
	}
	else{
		$smarty->assign('back_link', BASE_URL . 'user/' );
	}
	if($currentLinksPage[5]=='search')
	{
			if($currentLinksPage[6] != '')
			{
				$smarty->assign('back_link', BASE_URL .'search/' . $currentLinksPage[6] );
			}
			else
			{
				$smarty->assign('back_link', 'not_required' );
			}
	}
	if($currentLinksPage[5]=='advance_search')
	{
			if($currentLinksPage[6] != '')
			{
				$smarty->assign('back_link', BASE_URL .'advance_search/' . $currentLinksPage[6] );
			}
			else
			{
				$smarty->assign('back_link', 'not_required' );
			}
	}
}
$smarty->assign('user',$user->GetUserInfo());
$template = 'view.tpl';
?>