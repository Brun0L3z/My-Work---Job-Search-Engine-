{include file="header.tpl"}
<div id="changeheading"></div>
<div id="changepassword">
<form id="change_password" action="{$smarty.server.REQUEST_URI}" method="post">
 <table>
	<tr>
		<td align="right">Old Password<span style="color:red;">*</span>:</td>
		<td style="padding:3px">
		<input type="password" name="oldpassword" id="oldpassword" size="24" value="{$smarty.post.oldpassword}"/></td>
	</tr>
	<tr>
		<td></td>
		<td align="left" style="padding-left:3px">
		{if $register_errors.oldpassword}<div class="suggestion">{$register_errors.oldpassword}</div>{/if}</td>
	</tr>
	<tr>
		<td align="right">New Password<span style="color:red;">*</span> :</td>
		<td style="padding:3px">
		<input type="password" name="pwd" id="pwd" size="24"maxlength="15" value="{$smarty.post.pwd}"/></td>
	         
	</tr>
	<tr>
		<td></td>
		<td align="left" style="padding-left:3px">
		{if $register_errors.pwd}<div class="suggestion">{$register_errors.pwd}</div>{/if}</td>
	</tr>
	<tr>
		<td align="right">Confirm Password<span style="color:red;">*</span>:</td>
		<td style="padding:3px"><input type="password" name="cpwd" id="cpwd" size="24"	
		maxlength="15" value="{$smarty.post.cpwd}"/></td>
	</tr>
	<tr>
		<td></td>
		<td align="left" style="padding-left:3px">
		{if $register_errors.cpwd}<div 
		class="suggestion">{$register_errors.cpwd}</div>{/if}
		</td>
	</tr>
	<tr>
		<td></td>
		<td align="left" style="padding-left:3px">
		{if $register_errors.match}<div 
		class="suggestion">{$register_errors.match}</div>{/if}
		</td>
	</tr>
	<tr >
		<input type="hidden" name="id" value="{$login}" />
		<td colspan="2" align="center" style="padding:10px 0px 0px 87px;">
		<input type="submit" class="upadatebutton" value=""/><a href="{$BASE_URL}myprofile/">
		<input type="button" id="button_change"/></a>
		<input type="hidden" name="action" value="register" />
		</td>
	</tr>
</table>
  </form>
</div><!-- #changepassword -->
{include file="footer.tpl"}