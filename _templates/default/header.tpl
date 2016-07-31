{if $CURRENT_PAGE == 'page-unavailable' || $CURRENT_PAGE == 'job-unavailable'}
	{php}header("HTTP/1.0 404 Not Found");{/php}
{/if}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>Scan4jobs.com - Jobs - Best Jobs in India - Find Jobs - Right Jobs - Employment Search</title>
    {*<title>{if $seo_title}{$seo_title}{else}{$html_title}{/if}</title>*}
    <meta name="description" content="{if $seo_desc}{$seo_desc}{else}{$meta_description}{/if}" />
    <meta name="keywords" content="{if $seo_keys}{$seo_keys}{else}{$meta_keywords}{/if}" />
	<meta name="generator" content="Jobberbase v{$smarty.const.JOBBERBASE_VERSION}" />
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="shortcut icon" href="{$BASE_URL}logo.ico" type="image/x-png" />
	<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
	{if $CURRENT_PAGE == '' || $CURRENT_PAGE != 'jobs'}
		 <link rel="alternate" type="application/rss+xml" title="RSS 2.0" 
		 href="{$BASE_URL}rss/all/" />
	{else}
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" 
		href="{$BASE_URL}rss/{$current_category}/" />
	{/if}
	<link rel="stylesheet" href="{$BASE_URL}_templates/{$THEME}/css/screen.css" type="text/css" 
	media="screen" />
	<link rel="stylesheet" href="{$BASE_URL}_templates/{$THEME}/css/print.css" media="print" 
	type="text/css" />
	<script src="{$BASE_URL}js/jquery.js" type="text/javascript"></script>
	<!--[if !IE]><script src="{$BASE_URL}js/jquery.history.js" 
	type="text/javascript"></script><![endif]-->
 	<script src="{$BASE_URL}js/jquery.form.js" type="text/javascript"></script>
	<script src="{$BASE_URL}js/cmxforms.js" type="text/javascript"></script>
	<script src="{$BASE_URL}js/jquery.metadata.js" type="text/javascript"></script>
	<script src="{$BASE_URL}js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="{$BASE_URL}js/functions.js" type="text/javascript"></script>
	<script type="text/javascript">
		Jobber.I18n = {$translationsJson};
	</script>
	{literal}
	<script type="text/javascript">
	function validateForm(){
	 var s=document.forms["search_form"]["keywords"].value;
	 var h=document.forms["search_form"]["search"].value;
	 if( s == ''){
		 alert("Please enter search keywords");
		 return false;
	 }
	 if( s == h){
		 alert("Please enter search keywords");
		 return false;
	 }
	
	}
	</script>
	{/literal}
</head>

<body>
	<div id="border">
	<div id="container">

		{if $smarty.session.status neq ''}
			<div id="status">
				{$smarty.session.status}
			</div><!-- #status -->
		{/if}
		<div id="header">

			<h1 id="logo"><a href="{$BASE_URL}" title="{$translations.header.title}">{$translations.header.name}</a></h1>
			<!--<div id="aboutus">
				{if $navigation.primary != ''}
				{section name=tmp loop=$navigation.primary}
				{if $smarty.const.ENABLE_NEW_JOBS || (!$smarty.const.ENABLE_NEW_JOBS && $navigation.primary[tmp].url != 'post')}
				{if $i==1}{/if}
				<a href="{if $navigation.primary[tmp].outside != 1}{$BASE_URL}{/if}{$navigation.primary[tmp].url}/" title="{$navigation.primary[tmp].title}" >{$navigation.primary[tmp].name}</a>
							{assign var=i value=1}
				{/if}
				{/section}{/if}
				</div>--><!--about us-->
				
				<div id="logout">
				{if $login != ''}
				<a href="{$BASE_URL}logout/" title="logout" ><span style="font-size:14px;color:#0070C0;padding-top:5px;">Logout</span></a>
				{/if}
				</div>
				<div id="facebook">
				<a href="http://www.facebook.com/pages/Scan4jobs/166251550185171" target="_blank"><image src="{$BASE_URL}_templates/{$THEME}/img/facebook.png" value=""></a>
				<a href="https://twitter.com/Scan4jobs" target="_blank"><image  src="{$BASE_URL}_templates/{$THEME}/img/twitter.png" value=""/></a>
				<a href="http://in.linkedin.com/pub/scan4jobs-pvt-ltd/5b/3b6/395" target="_blank"><image src="{$BASE_URL}_templates/{$THEME}/img/linkedin.png" value=""/></a>
				</div>
			</div><!--header-->
			<div id="caption">
			Find best jobs to boost your career
			</div>

    <div id="nav">
<div id="navs">
<div id="cssmenu">
	
    		<ul>
			<!--{section name=tmp loop=$categories}
			<li id="{$categories[tmp].var_name}" {if $current_category == $categories[tmp].var_name}class="selected"{/if}><a href="{$BASE_URL}{$URL_JOBS}/{$categories[tmp].var_name}/" title="{$categories[tmp].name}"><span>{$categories[tmp].name}</span><span class="cnr">&nbsp;</span></a></li>
			{/section}-->
			{if $navigation.primary != ''}
				{section name=tmp loop=$navigation.primary}
						{if $smarty.const.ENABLE_NEW_JOBS || (!$smarty.const.ENABLE_NEW_JOBS && `$navigation.primary[tmp].url != 'post')}
							{if $i==1}{/if}
							<li><a href="{if $navigation.primary[tmp].outside != 1}{$BASE_URL}{/if}{$navigation.primary[tmp].url}/" title="{$navigation.primary[tmp].title}" >{$navigation.primary[tmp].name}</a></li>
							{assign var=i value=1}
						{/if}
					{/section}
			{/if}
			 </ul>
		</div>
	</div><!--navs  -->
	<div id="utils">
	<form id="search_form" id="tw-form" name="search_form" method="post" action="{$BASE_URL}search/" onSubmit="return validateForm();">
		<input type="text"  id="keywords" name="keywords"  onChange="function(this.value)"  
		 value="{if $keywords}{$keywords}{else}{$translations.search.default}{/if}" />
		<input type="hidden" name="search" value="{$translations.search.default}"/> 
		<input type="submit" value="" id="go">
		 <input type="hidden" name="action" value="search"/>
	</form>
</div><!--utils-->
</div><!--nav-->
	<div class="clear"></div>
	{if $login != ''}
		{if $profile != 'profile'}
			{if $sidebar != 'sidebar'}
				{if $sb == sb}
					<div id="sidebar">
						{include file="sidebar.tpl"}
					</div><!-- #sidebar -->
				{/if}
			{/if}
		{/if}
	{/if}
{if $login != ''}
	{literal}
	<script type="text/javascript">
	var t;
	window.onload=resetTimer;
	document.onkeypress=resetTimer;

	function logout()
	{
		alert("You are now logged out \n You will now be redirected to home page.")
		location.href="{$BASE_URL}logout/" 
	}
	function resetTimer()
	{
		clearTimeout(t);
		t=setTimeout(logout,1800000) 
	}
	</script>
	{/literal}
{/if}
		