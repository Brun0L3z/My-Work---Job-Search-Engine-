{include file="header.tpl"}
{if $msg != ''}

<div id="forgotmessage">
{$msg}
</div>
{/if}
<div id="logincenter">
	<table>
	<tr>
		
		
	<td>
	<!-- login page-->
		<div id="logindiv">
		<div id="para"></div>
		 <table class="loginbg">
		<form  method="post" action="{$BASE_URL}detaillogin/">
		<tr>
		<td height="227"align="center" valign="middle" >
		<table width="100%" border="0" cellspacing="0" cellpadding="3">
		 <tr>
			<td valign="top">
			<img src="{$BASE_URL}_templates/{$THEME}/img/lap.gif" width="164" height="82" border="0" />
			</td>
		</tr>
		 <tr>
			<td height="5px">
			<div class="suggestion">{$errors.incorrect}</div>
			<div class="suggestion">{$errors.username}</div>
			<div class="suggestion">{$errors.password}</div>
			</td>
		 </tr>
			
		<tr>
			<td><input type="text" name="username" id="username" size="20" 
				value="{$smarty.post.username}"  class="inputtxt" />
			</td>
			
		
		</tr>
     
		<tr>
			<td align="center"><input type="password" name="password" id="password" class="inputtxtpwd"/>
			</td>
			
				
		</tr>
		 <tr>
			<td height="40" align="center" valign="bottom">
			<a href="#"><input type="image" src="{$BASE_URL}_templates/{$THEME}/img/jobseeker.png" value=""/>
			<input type="hidden" name="action" value="login" />

			</td>
		</tr>
			<tr>
			<td height="20" align="center" valign="bottom">
			<div id="siva">
			<a href="{$BASE_URL}forgotpassword"><u>Forgot Password?</u></a>
			</div>
			</td>
		</tr>
		
		
		</table>
	</td>
	</tr>

		
   </form>
</table>
 </div><!-- login div -->
</td>

</tr>
</table>
</div><!--login center-->

{include file="footer.tpl"}



