<?php /* Smarty version 2.6.26, created on 2012-11-09 10:59:57
         compiled from clear-cache.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="content">
<h2 id="password">Clear Cache</h2>
<?php if ($this->_tpl_vars['user_success']): ?>
		User cache cleared. 
 
	<?php endif; ?>
	<?php if ($this->_tpl_vars['admin_success']): ?>
		Admin cache cleared. 
 
	<?php endif; ?></div>
<!-- #content -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>