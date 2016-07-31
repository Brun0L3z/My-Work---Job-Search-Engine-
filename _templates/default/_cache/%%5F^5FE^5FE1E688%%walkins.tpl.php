<?php /* Smarty version 2.6.26, created on 2012-11-09 11:00:57
         compiled from walkins.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'walkins.tpl', 3, false),)), $this); ?>
<marquee onmouseover='this.stop();'onmouseout='this.start();'direction="up" height="200"  scrollamount="2">
<?php $_from = $this->_tpl_vars['latest_jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
<div class="<?php echo smarty_function_cycle(array('values' => 'ro,ro-alt'), $this);?>
">
	<span class="ro-info">
		<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['URL_JOB']; ?>
/<?php echo $this->_tpl_vars['job']['id']; ?>
/<?php echo $this->_tpl_vars['job']['url_title']; ?>
/" 
			title="<?php echo $this->_tpl_vars['job']['title']; ?>
" target="_blank">
			<u><?php echo $this->_tpl_vars['job']['title']; ?>
</u></a>&nbsp;[<?php echo $this->_tpl_vars['job']['minexp']; ?>

			<span class="la"> to </span><?php echo $this->_tpl_vars['job']['maxexp']; ?>

			<span class="la"> Yrs </span>]<span class="scrollcity">[<?php if ($this->_tpl_vars['job']['is_location_anywhere']): ?>, 
			(<?php echo $this->_tpl_vars['translations']['jobs']['location_anywhere']; ?>
)<?php else: ?>
			<?php echo $this->_tpl_vars['job']['location']; ?>
<?php endif; ?>]</span><br>
			<span><?php echo $this->_tpl_vars['job']['company']; ?>
&nbsp;</span>
			
						
		</span>
		</div>
	<?php endforeach; endif; unset($_from); ?></marquee>