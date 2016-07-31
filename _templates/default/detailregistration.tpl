{ include file="header.tpl"}
{literal}
<script type="text/javascript">
 function numbersOnly(evt,val) { 
	  evt = (evt) ? evt : event; 
	  var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0)); 
	  if ( (charCode >= 48 && charCode <= 57) || charCode == 8 || charCode == 9 || charCode == 13) { 
	    return true; 
	  }; 
	  return false; 
	} 
</script>
{/literal}
<div id="logincenter">	
<div id="side1">
	<form id="register" method="post" action="{$BASE_URL}detailregistration/">
	<div id="reg_h1"></div>
	<table>
		<tr>
		<td align="right">Email ID<span style="color:red;">*</span>:</td>
		<td style="padding:3px"><input type="text" name="email" id="email" size="24" 
						 value="{$smarty.post.email}"/></td>
				   </tr>
				   <tr>
					<td></td>

					<td align="left" style="padding-left:3px">{if $register_errors.email}<div 
					class="suggestion">{$register_errors.email}</div>{/if}
					</td>
				   </tr>
				    <tr>
					<td></td>
					<td align="left" style="padding-left:3px">{if $register_errors.id}<div 
					class="suggestion">{$register_errors.id}</div>{/if}
					</td>
				   </tr>
					<tr>
					   <td align="right">Password<span style="color:red;">*</span> :</td>
					   <td style="padding:3px"><input type="password" name="pwd" id="pwd" size="24"	
						maxlength="15" value="{$smarty.post.pwd}"/></td>
					</tr>
					 <tr>
						<td></td>
						<td align="left" style="padding-left:3px">
							  {if $register_errors.pwd}<div 
							 class="suggestion">{$register_errors.pwd}</div>{/if}
						</td>
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
					 </table>
					 <table>
					 <tr>
					 <td align="left" style="padding-left:50px">Mobile No<span style="color:red;">*</span>:</td>
						  <td align="left" style="padding:3px;">
						  
						 +91<input type="tel" id="mblno" name="contactnumber" id="contactnumber" size="22" maxlength="10"
							 value="{$smarty.post.contactnumber}" onkeypress="return numbersOnly(event,this.value);"/></td>
					</tr>
					 <tr>
						 <td></td>
						 <td align="left" style="padding-left:3px">{if $register_errors.contactnumber}<div 
						  class="suggestion">{$register_errors.contactnumber}</div>{/if}
						 </td>
						 
					</tr>
					</table>
					<table>
					<tr>
					
					  <td colspan="2" style="padding-left:85px;">
					   <input type="checkbox" name="sms" id="sms" size="20" value="1" {if $smarty.request.sms  == 1}checked{/if} />Receive SMS Alerts.</td>
				   </tr>
				   <tr>
					  <td colspan="2" style="padding-left:85px;">
					  <input type="checkbox" name="terms" id="terms" size="20" value="1" {if $smarty.request.terms  == 1}checked{/if}/>I agree to the<a href="{$BASE_URL}terms/" title="logout" target="_blank">Terms & Conditions.</a> 
						{if $register_errors.terms}
						<div class="suggestion"><sapn style="padding-left:12px;">{$register_errors.terms}
						</span></div>
						{/if}
						<input type="hidden" name="job_id" value="{$job_id}"/>
			<input type="hidden" name="title" value="{$title}"/>
					  </td>
				   </tr>
					 <tr >
						<td colspan="2" align="center" style="padding-top:10px;">

						<a href="#"><input type="image" src="{$BASE_URL}_templates/{$THEME}/img/continuetoregistration.png" value=""/>
						
						<input type="hidden" name="action" value="register" />
						
						</td>
					</tr>
				</table>
     </form>
</div><!-- side1 closed-->
</div><!--login center-->

{include file="footer.tpl"}