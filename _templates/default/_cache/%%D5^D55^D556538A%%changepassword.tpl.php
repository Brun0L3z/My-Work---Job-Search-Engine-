<?php /* Smarty version 2.6.26, created on 2012-11-09 11:00:04
         compiled from changepassword.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="changeheading"></div>
<div id="changepassword">
<form id="change_password" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
 <table>
	<tr>
		<td align="right">Old Password<span style="color:red;">*</span>:</td>
		<td style="padding:3px">
		<input type="password" name="oldpassword" id="oldpassword" size="24" value="<?php echo $_POST['oldpassword']; ?>
"/></td>
	</tr>
	<tr>
		<td></td>
		<td align="left" style="padding-left:3px">
		<?php if ($this->_tpl_vars['register_errors']['oldpassword']): ?><div class="suggestion"><?php echo $this->_tpl_vars['register_errors']['oldpassword']; ?>
</div><?php endif; ?></td>
	</tr>
	<tr>
		<td align="right">New Password<span style="color:red;">*</span> :</td>
		<td style="padding:3px">
		<input type="password" name="pwd" id="pwd" size="24"maxlength="15" value="<?php echo $_POST['pwd']; ?>
"/></td>
	         
	</tr>
	<tr>
		<td></td>
		<td align="left" style="padding-left:3px">
		<?php if ($this->_tpl_vars['register_errors']['pwd']): ?><div class="suggestion"><?php echo $this->_tpl_vars['register_errors']['pwd']; ?>
</div><?php endif; ?></td>
	</tr>
	<tr>
		<td align="right">Confirm Password<span style="color:red;">*</span>:</td>
		<td style="padding:3px"><input type="password" name="cpwd" id="cpwd" size="24"	
		maxlength="15" value="<?php echo $_POST['cpwd']; ?>
"/></td>
	</tr>
	<tr>
		<td></td>
		<td align="left" style="padding-left:3px">
		<?php if ($this->_tpl_vars['register_errors']['cpwd']): ?><div 
		class="suggestion"><?php echo $this->_tpl_vars['register_errors']['cpwd']; ?>
</div><?php endif; ?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td align="left" style="padding-left:3px">
		<?php if ($this->_tpl_vars['register_errors']['match']): ?><div 
		class="suggestion"><?php echo $this->_tpl_vars['register_errors']['match']; ?>
</div><?php endif; ?>
		</td>
	</tr>
	<tr >
		<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['login']; ?>
" />
		<td colspan="2" align="center" style="padding:10px 0px 0px 87px;">
		<input type="submit" class="upadatebutton" value=""/><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/">
		<input type="button" id="button_change"/></a>
		<input type="hidden" name="action" value="register" />
		</td>
	</tr>
</table>
  </form>
</div><!-- #changepassword -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>