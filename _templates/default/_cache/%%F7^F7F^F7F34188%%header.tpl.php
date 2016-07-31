<?php /* Smarty version 2.6.26, created on 2012-11-09 11:00:00
         compiled from header.tpl */ ?>
<?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'page-unavailable' || $this->_tpl_vars['CURRENT_PAGE'] == 'job-unavailable'): ?>
	<?php header("HTTP/1.0 404 Not Found"); ?>
<?php endif; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>Scan4jobs.com - Jobs - Best Jobs in India - Find Jobs - Right Jobs - Employment Search</title>
        <meta name="description" content="<?php if ($this->_tpl_vars['seo_desc']): ?><?php echo $this->_tpl_vars['seo_desc']; ?>
<?php else: ?><?php echo $this->_tpl_vars['meta_description']; ?>
<?php endif; ?>" />
    <meta name="keywords" content="<?php if ($this->_tpl_vars['seo_keys']): ?><?php echo $this->_tpl_vars['seo_keys']; ?>
<?php else: ?><?php echo $this->_tpl_vars['meta_keywords']; ?>
<?php endif; ?>" />
	<meta name="generator" content="Jobberbase v<?php echo @JOBBERBASE_VERSION; ?>
" />
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
logo.ico" type="image/x-png" />
	<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
	<?php if ($this->_tpl_vars['CURRENT_PAGE'] == '' || $this->_tpl_vars['CURRENT_PAGE'] != 'jobs'): ?>
		 <link rel="alternate" type="application/rss+xml" title="RSS 2.0" 
		 href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
rss/all/" />
	<?php else: ?>
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" 
		href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
rss/<?php echo $this->_tpl_vars['current_category']; ?>
/" />
	<?php endif; ?>
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/css/screen.css" type="text/css" 
	media="screen" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/css/print.css" media="print" 
	type="text/css" />
	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/jquery.js" type="text/javascript"></script>
	<!--[if !IE]><script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/jquery.history.js" 
	type="text/javascript"></script><![endif]-->
 	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/jquery.form.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/cmxforms.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/jquery.metadata.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
js/functions.js" type="text/javascript"></script>
	<script type="text/javascript">
		Jobber.I18n = <?php echo $this->_tpl_vars['translationsJson']; ?>
;
	</script>
	<?php echo '
	<script type="text/javascript">
	function validateForm(){
	 var s=document.forms["search_form"]["keywords"].value;
	 var h=document.forms["search_form"]["search"].value;
	 if( s == \'\'){
		 alert("Please enter search keywords");
		 return false;
	 }
	 if( s == h){
		 alert("Please enter search keywords");
		 return false;
	 }
	
	}
	</script>
	'; ?>

</head>

<body>
	<div id="border">
	<div id="container">

		<?php if ($_SESSION['status'] != ''): ?>
			<div id="status">
				<?php echo $_SESSION['status']; ?>

			</div><!-- #status -->
		<?php endif; ?>
		<div id="header">

			<h1 id="logo"><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
" title="<?php echo $this->_tpl_vars['translations']['header']['title']; ?>
"><?php echo $this->_tpl_vars['translations']['header']['name']; ?>
</a></h1>
			<!--<div id="aboutus">
				<?php if ($this->_tpl_vars['navigation']['primary'] != ''): ?>
				<?php unset($this->_sections['tmp']);
$this->_sections['tmp']['name'] = 'tmp';
$this->_sections['tmp']['loop'] = is_array($_loop=$this->_tpl_vars['navigation']['primary']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tmp']['show'] = true;
$this->_sections['tmp']['max'] = $this->_sections['tmp']['loop'];
$this->_sections['tmp']['step'] = 1;
$this->_sections['tmp']['start'] = $this->_sections['tmp']['step'] > 0 ? 0 : $this->_sections['tmp']['loop']-1;
if ($this->_sections['tmp']['show']) {
    $this->_sections['tmp']['total'] = $this->_sections['tmp']['loop'];
    if ($this->_sections['tmp']['total'] == 0)
        $this->_sections['tmp']['show'] = false;
} else
    $this->_sections['tmp']['total'] = 0;
if ($this->_sections['tmp']['show']):

            for ($this->_sections['tmp']['index'] = $this->_sections['tmp']['start'], $this->_sections['tmp']['iteration'] = 1;
                 $this->_sections['tmp']['iteration'] <= $this->_sections['tmp']['total'];
                 $this->_sections['tmp']['index'] += $this->_sections['tmp']['step'], $this->_sections['tmp']['iteration']++):
$this->_sections['tmp']['rownum'] = $this->_sections['tmp']['iteration'];
$this->_sections['tmp']['index_prev'] = $this->_sections['tmp']['index'] - $this->_sections['tmp']['step'];
$this->_sections['tmp']['index_next'] = $this->_sections['tmp']['index'] + $this->_sections['tmp']['step'];
$this->_sections['tmp']['first']      = ($this->_sections['tmp']['iteration'] == 1);
$this->_sections['tmp']['last']       = ($this->_sections['tmp']['iteration'] == $this->_sections['tmp']['total']);
?>
				<?php if (@ENABLE_NEW_JOBS || ( ! @ENABLE_NEW_JOBS && $this->_tpl_vars['navigation']['primary'][$this->_sections['tmp']['index']]['url'] != 'post' )): ?>
				<?php if ($this->_tpl_vars['i'] == 1): ?><?php endif; ?>
				<a href="<?php if ($this->_tpl_vars['navigation']['primary'][$this->_sections['tmp']['index']]['outside'] != 1): ?><?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['navigation']['primary'][$this->_sections['tmp']['index']]['url']; ?>
/" title="<?php echo $this->_tpl_vars['navigation']['primary'][$this->_sections['tmp']['index']]['title']; ?>
" ><?php echo $this->_tpl_vars['navigation']['primary'][$this->_sections['tmp']['index']]['name']; ?>
</a>
							<?php $this->assign('i', 1); ?>
				<?php endif; ?>
				<?php endfor; endif; ?><?php endif; ?>
				</div>--><!--about us-->
				
				<div id="logout">
				<?php if ($this->_tpl_vars['login'] != ''): ?>
				<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
logout/" title="logout" ><span style="font-size:14px;color:#0070C0;padding-top:5px;">Logout</span></a>
				<?php endif; ?>
				</div>
				<div id="facebook">
				<a href="http://www.facebook.com/pages/Scan4jobs/166251550185171" target="_blank"><image src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/facebook.png" value=""></a>
				<a href="https://twitter.com/Scan4jobs" target="_blank"><image  src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/twitter.png" value=""/></a>
				<a href="http://in.linkedin.com/pub/scan4jobs-pvt-ltd/5b/3b6/395" target="_blank"><image src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/linkedin.png" value=""/></a>
				</div>
			</div><!--header-->
			<div id="caption">
			Find best jobs to boost your career
			</div>

    <div id="nav">
<div id="navs">
<div id="cssmenu">
	
    		<ul>
			<!--<?php unset($this->_sections['tmp']);
$this->_sections['tmp']['name'] = 'tmp';
$this->_sections['tmp']['loop'] = is_array($_loop=$this->_tpl_vars['categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tmp']['show'] = true;
$this->_sections['tmp']['max'] = $this->_sections['tmp']['loop'];
$this->_sections['tmp']['step'] = 1;
$this->_sections['tmp']['start'] = $this->_sections['tmp']['step'] > 0 ? 0 : $this->_sections['tmp']['loop']-1;
if ($this->_sections['tmp']['show']) {
    $this->_sections['tmp']['total'] = $this->_sections['tmp']['loop'];
    if ($this->_sections['tmp']['total'] == 0)
        $this->_sections['tmp']['show'] = false;
} else
    $this->_sections['tmp']['total'] = 0;
if ($this->_sections['tmp']['show']):

            for ($this->_sections['tmp']['index'] = $this->_sections['tmp']['start'], $this->_sections['tmp']['iteration'] = 1;
                 $this->_sections['tmp']['iteration'] <= $this->_sections['tmp']['total'];
                 $this->_sections['tmp']['index'] += $this->_sections['tmp']['step'], $this->_sections['tmp']['iteration']++):
$this->_sections['tmp']['rownum'] = $this->_sections['tmp']['iteration'];
$this->_sections['tmp']['index_prev'] = $this->_sections['tmp']['index'] - $this->_sections['tmp']['step'];
$this->_sections['tmp']['index_next'] = $this->_sections['tmp']['index'] + $this->_sections['tmp']['step'];
$this->_sections['tmp']['first']      = ($this->_sections['tmp']['iteration'] == 1);
$this->_sections['tmp']['last']       = ($this->_sections['tmp']['iteration'] == $this->_sections['tmp']['total']);
?>
			<li id="<?php echo $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['var_name']; ?>
" <?php if ($this->_tpl_vars['current_category'] == $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['var_name']): ?>class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['URL_JOBS']; ?>
/<?php echo $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['var_name']; ?>
/" title="<?php echo $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['name']; ?>
"><span><?php echo $this->_tpl_vars['categories'][$this->_sections['tmp']['index']]['name']; ?>
</span><span class="cnr">&nbsp;</span></a></li>
			<?php endfor; endif; ?>-->
			<?php if ($this->_tpl_vars['navigation']['primary'] != ''): ?>
				<?php unset($this->_sections['tmp']);
$this->_sections['tmp']['name'] = 'tmp';
$this->_sections['tmp']['loop'] = is_array($_loop=$this->_tpl_vars['navigation']['primary']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tmp']['show'] = true;
$this->_sections['tmp']['max'] = $this->_sections['tmp']['loop'];
$this->_sections['tmp']['step'] = 1;
$this->_sections['tmp']['start'] = $this->_sections['tmp']['step'] > 0 ? 0 : $this->_sections['tmp']['loop']-1;
if ($this->_sections['tmp']['show']) {
    $this->_sections['tmp']['total'] = $this->_sections['tmp']['loop'];
    if ($this->_sections['tmp']['total'] == 0)
        $this->_sections['tmp']['show'] = false;
} else
    $this->_sections['tmp']['total'] = 0;
if ($this->_sections['tmp']['show']):

            for ($this->_sections['tmp']['index'] = $this->_sections['tmp']['start'], $this->_sections['tmp']['iteration'] = 1;
                 $this->_sections['tmp']['iteration'] <= $this->_sections['tmp']['total'];
                 $this->_sections['tmp']['index'] += $this->_sections['tmp']['step'], $this->_sections['tmp']['iteration']++):
$this->_sections['tmp']['rownum'] = $this->_sections['tmp']['iteration'];
$this->_sections['tmp']['index_prev'] = $this->_sections['tmp']['index'] - $this->_sections['tmp']['step'];
$this->_sections['tmp']['index_next'] = $this->_sections['tmp']['index'] + $this->_sections['tmp']['step'];
$this->_sections['tmp']['first']      = ($this->_sections['tmp']['iteration'] == 1);
$this->_sections['tmp']['last']       = ($this->_sections['tmp']['iteration'] == $this->_sections['tmp']['total']);
?>
						<?php if (@ENABLE_NEW_JOBS || ( ! @ENABLE_NEW_JOBS && "`".($this->_tpl_vars['navigation']).".primary[tmp].url" != 'post' )): ?>
							<?php if ($this->_tpl_vars['i'] == 1): ?><?php endif; ?>
							<li><a href="<?php if ($this->_tpl_vars['navigation']['primary'][$this->_sections['tmp']['index']]['outside'] != 1): ?><?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['navigation']['primary'][$this->_sections['tmp']['index']]['url']; ?>
/" title="<?php echo $this->_tpl_vars['navigation']['primary'][$this->_sections['tmp']['index']]['title']; ?>
" ><?php echo $this->_tpl_vars['navigation']['primary'][$this->_sections['tmp']['index']]['name']; ?>
</a></li>
							<?php $this->assign('i', 1); ?>
						<?php endif; ?>
					<?php endfor; endif; ?>
			<?php endif; ?>
			 </ul>
		</div>
	</div><!--navs  -->
	<div id="utils">
	<form id="search_form" id="tw-form" name="search_form" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
search/" onSubmit="return validateForm();">
		<input type="text"  id="keywords" name="keywords"  onChange="function(this.value)"  
		 value="<?php if ($this->_tpl_vars['keywords']): ?><?php echo $this->_tpl_vars['keywords']; ?>
<?php else: ?><?php echo $this->_tpl_vars['translations']['search']['default']; ?>
<?php endif; ?>" />
		<input type="hidden" name="search" value="<?php echo $this->_tpl_vars['translations']['search']['default']; ?>
"/> 
		<input type="submit" value="" id="go">
		 <input type="hidden" name="action" value="search"/>
	</form>
</div><!--utils-->
</div><!--nav-->
	<div class="clear"></div>
	<?php if ($this->_tpl_vars['login'] != ''): ?>
		<?php if ($this->_tpl_vars['profile'] != 'profile'): ?>
			<?php if ($this->_tpl_vars['sidebar'] != 'sidebar'): ?>
				<?php if ($this->_tpl_vars['sb'] == sb): ?>
					<div id="sidebar">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div><!-- #sidebar -->
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
<?php if ($this->_tpl_vars['login'] != ''): ?>
	<?php echo '
	<script type="text/javascript">
	var t;
	window.onload=resetTimer;
	document.onkeypress=resetTimer;

	function logout()
	{
		alert("You are now logged out \\n You will now be redirected to home page.")
		location.href="{$BASE_URL}logout/" 
	}
	function resetTimer()
	{
		clearTimeout(t);
		t=setTimeout(logout,1800000) 
	}
	</script>
	'; ?>

<?php endif; ?>
		